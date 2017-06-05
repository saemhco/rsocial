<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use App\Proyest;
use App\Estudiante;
use App\User;
use App\Documento;
use Redirect;
use Auth;
use Input;
use Validator;
use Storage;
use Carbon\Carbon;


class DocenteProyectoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('docente',['except' => ['getPdf', 'getObs','getDescargar','getAdjunto'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos=\App\Curso::lists('curso','id');
        $proyectos=Proyecto::where('docente_id',Auth::user()->id)->get();
        return view('docente.proyectos',compact('cursos','proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos=\App\Curso::lists('curso','id');
        $tipos=array('1'=>'Proyección Social',
                     '2'=>'Extensión Universitaria');
        $satisfaccionInvolucrados=array(
                          '1' => 'Totalmente insatisfecho',
                          '2' => 'Insatisfecho',
                          '3' => 'Parcialmente satisfecho',
                          '5' => 'Satisfecho',
                          '6' => 'Totalmente satisfecho');
        return view('docente.nuevo-proyecto',compact('cursos','tipos','satisfaccionInvolucrados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $proyecto= new Proyecto;
        $proyecto->docente_id=Auth::user()->id;
        $proyecto->curso_id=$request->get('curso');
        $proyecto->semestre=$request->get('semestre');
        $proyecto->ciclo=$request->get('ciclo');
        $proyecto->seccion=$request->get('seccion');
        $proyecto->tipo=$request->get('tipo');
        $proyecto->titulo=$request->get('titulo');
        $proyecto->porcentaje=$request->get('porcentaje');
        $proyecto->objetivos=$request->get('objetivos');
        $proyecto->justificacion=$request->get('justificacion');
        $proyecto->logros=$request->get('logros');
        $proyecto->dificultades=$request->get('dificultades');
        $proyecto->beneficiarios=$request->get('beneficiarios');
        $proyecto->lugar=$request->get('lugar');

        //Lo que pidió agregar la Decana
        $proyecto->grupo_interes=$request->get('grupo_interes');
        $proyecto->satisfacion_involucrados=$request->get('satisfacion_involucrados');
        $proyecto->resolucion_proyecto=$request->get('resolucion_proyecto');
        $proyecto->resolucion_informe=$request->get('resolucion_informe');
            //File Registro de participación
            $registro_participacion = Input::file('registro_participacion');
            if(!empty($registro_participacion)){
                //tamaño del archivo en kBytes
                    $condiciones= array('registro_participacion' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($registro_participacion->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_rp=Carbon::now()->second.'registro-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/registro/'.$nombre_rp,  \File::get($registro_participacion)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                    }
            }else{
                $nombre_rp="";
            }
            $proyecto->registro_participacion=$nombre_rp;

            
            //File Excel
            $excelSatisfaccion = Input::file('excelSatisfaccion');
            if(!empty($excelSatisfaccion)){
                //tamaño del archivo en kBytes
                    $condiciones= array('excelSatisfaccion' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($excelSatisfaccion->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_ex=Carbon::now()->second.'excel-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/excel/'.$nombre_ex,  \File::get($excelSatisfaccion)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                    }
            }else{
                $nombre_ex="";
            }
            $proyecto->sat_inv_excel=$nombre_ex;
            

            //File evidencias
            $evidencias = Input::file('evidencias');
            if(!empty($evidencias)){
                //tamaño del archivo en kBytes
                    $condiciones= array('evidencias' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($evidencias->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_ev=Carbon::now()->second.'evidencia-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/evidencias/'.$nombre_ev,  \File::get($evidencias)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                    }
            }else{
                $nombre_ev="";
            }
            $proyecto->evidencias=$nombre_ev;

            //----------------------------

        $proyecto->save();
        return Redirect::to('docenteproyecto');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p=Proyecto::where('proyectos.id',$id)
                ->join('users','proyectos.docente_id','=','users.id')
                ->join('cursos','proyectos.curso_id','=','cursos.id')
                ->select('proyectos.*', 'users.nombres as n', 'users.apellidos as a','cursos.curso as curso')
                ->first();
        $satisfaccion=array(
                          '' => '',
                          '1' => 'Totalmente insatisfecho',
                          '2' => 'Insatisfecho',
                          '3' => 'Parcialmente satisfecho',
                          '5' => 'Satisfecho',
                          '6' => 'Totalmente satisfecho');

        $estudiantes=User::join('proyests','users.id','=','proyests.estudiante_id')->where('proyests.proyecto_id',$id)->select('users.*')->get();
        return view('docente.acciones.informacion', compact('p','estudiantes','satisfaccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos=\App\Curso::lists('curso','id');
        $tipos=array('1'=>'Proyección Social',
                     '2'=>'Extensión Universitaria');
        $satisfaccionInvolucrados=array(
                          '1' => 'Totalmente insatisfecho',
                          '2' => 'Insatisfecho',
                          '3' => 'Parcialmente satisfecho',
                          '5' => 'Satisfecho',
                          '6' => 'Totalmente satisfecho');
        $mp=Proyecto::find($id); //Mi proyecto
        return view('docente.editar-proyecto',compact('cursos','tipos', 'mp','satisfaccionInvolucrados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto=  Proyecto::find($id);
        $proyecto->docente_id=Auth::user()->id;
        $proyecto->curso_id=$request->get('curso');
        $proyecto->semestre=$request->get('semestre');
        $proyecto->ciclo=$request->get('ciclo');
        $proyecto->seccion=$request->get('seccion');
        $proyecto->tipo=$request->get('tipo');
        $proyecto->titulo=$request->get('titulo');
        $proyecto->porcentaje=$request->get('porcentaje');
        $proyecto->objetivos=$request->get('objetivos');
        $proyecto->justificacion=$request->get('justificacion');
        $proyecto->logros=$request->get('logros');
        $proyecto->dificultades=$request->get('dificultades');
        $proyecto->beneficiarios=$request->get('beneficiarios');
        $proyecto->lugar=$request->get('lugar');

                //Lo que pidió agregar la Decana
        $proyecto->grupo_interes=$request->get('grupo_interes');
        $proyecto->satisfacion_involucrados=$request->get('satisfacion_involucrados');
        $proyecto->resolucion_proyecto=$request->get('resolucion_proyecto');
        $proyecto->resolucion_informe=$request->get('resolucion_informe');
            //File Registro de participación
            $registro_participacion = Input::file('registro_participacion');
            if(!empty($registro_participacion)){
             //Primero eliminamos en caso exista el archivo
              if($proyecto->registro_participacion!=''){
                if (Storage::exists('proyectos/registro/'.$proyecto
                      ->registro_participacion)){
                    Storage::delete('proyectos/registro/'.$proyecto
                      ->registro_participacion);
                }
              }
             //Luego de eliminar...
                //tamaño del archivo en kBytes
                    $condiciones= array('registro_participacion' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($registro_participacion->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_rp=Carbon::now()->second.'registro-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/registro/'.$nombre_rp,  \File::get($registro_participacion)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                      $proyecto->registro_participacion=$nombre_rp;
                    }
            }

            
            //File Excel
            $excelSatisfaccion = Input::file('excelSatisfaccion');
            if(!empty($excelSatisfaccion)){
              //Primero eliminamos en caso exista el archivo
              if($proyecto->sat_inv_excel!=''){
                if (Storage::exists('proyectos/excel/'.$proyecto->sat_inv_excel)){
                    Storage::delete('proyectos/excel/'.$proyecto
                      ->sat_inv_excel);
                }
              }
                //tamaño del archivo en kBytes
                    $condiciones= array('excelSatisfaccion' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($excelSatisfaccion->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_ex=Carbon::now()->second.'excel-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/excel/'.$nombre_ex,  \File::get($excelSatisfaccion)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                      $proyecto->sat_inv_excel=$nombre_ex;
                    }
            }
            
            

            //File evidencias
            $evidencias = Input::file('evidencias');
            if(!empty($evidencias)){
              //Primero eliminamos en caso exista el archivo
              if($proyecto->evidencias!=''){
                if (Storage::exists('proyectos/evidencias/'.$proyecto
                      ->evidencias)){
                    Storage::delete('proyectos/evidencias/'.$proyecto
                      ->evidencias);
                }
              }
                //tamaño del archivo en kBytes
                    $condiciones= array('evidencias' => 'max:3072' );
                    $validator=Validator::make(Input::all(),$condiciones);
                    if ($validator->fails()){
                      return back()->withErrors($validator);
                    }else{
                      $extension = pathinfo($evidencias->getClientOriginalName(), PATHINFO_EXTENSION);
                      $nombre_ev=Carbon::now()->second.'evidencia-'.$request->get('titulo').'.'.$extension;

                      if(!(\Storage::disk('local')->put('proyectos/evidencias/'.$nombre_ev,  \File::get($evidencias)) )){
                      return back()->with('rojo','Algo salió mal '); 
                      }
                      $proyecto->evidencias=$nombre_ev;
                    }
            }

            //----------------------------
        $proyecto->save();
        return Redirect::to('docenteproyecto');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDescargar($id)
    {
        $ds=Documento::where('proyecto_id',$id)->get();//Documentos
        return view('docente.acciones.descargar-datos',compact('ds'));
    }
    public function getAdjunto($id)
    {
        $py=Proyecto::find($id);//Documentos
        return view('docente.acciones.adjunto-datos',compact('py'));
    }
    public function getSubir($id)
    {
        $documentos=Documento::where('proyecto_id',$id)->lists('documentos.version','documentos.id');
        return view('docente.acciones.subir-datos',compact('documentos'));
    }
    public function getPdf($id)
    {
        //return "Esto es el PDF ".$id;
        $p=Proyecto::find($id);
        $satisfaccionInvolucrados=array(
                          '' => '',
                          '1' => 'Totalmente insatisfecho',
                          '2' => 'Insatisfecho',
                          '3' => 'Parcialmente satisfecho',
                          '5' => 'Satisfecho',
                          '6' => 'Totalmente satisfecho');
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $estudiantes=User::join('proyests','users.id','=','proyests.estudiante_id')->where('proyests.proyecto_id',$id)->select('users.*')->get();
        $view =  \View::make('pdf', compact('p','date','estudiantes','satisfaccionInvolucrados'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download($p->titulo.'.pdf');
        //return $pdf->stream('invoiced');
    }
    public function getIntegrantes($id)
    {
        $estudiantes=User::where('tipo','2')->where('estado','1')->get();
        $misestudiantes=Proyest::where('proyecto_id',$id)->get();
        return view('docente.acciones.integrantes-modal',compact('estudiantes','misestudiantes','id'));
    }
    public function postIntupdate()
    {
        $pe=new Proyest;
        $pe->proyecto_id=Input::get('proyecto');
        $pe->estudiante_id=Input::get('estudiante');
        $pe->save();
        return Redirect::to('docenteproyecto')->with('verde','se agregó un estudiante al proyecto');
    }
    public function postInteliminar()
    {
        Proyest::destroy(Input::get('estudiante'));
        return Redirect::to('docenteproyecto')->with('verde','se eliminó un integrante del proyecto');
    }
    public function getObs($id)
    {
        $p=Proyecto::find($id);
        return view('docente.acciones.obs',compact('p'));
    }

}
