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
use Carbon\Carbon;


class DocenteProyectoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('docente',['except' => ['getPdf', 'getObs','getDescargar'] ]);
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
        return view('docente.nuevo-proyecto',compact('cursos','tipos'));
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
        $estudiantes=User::join('proyests','users.id','=','proyests.estudiante_id')->where('proyests.proyecto_id',$id)->select('users.*')->get();
        return view('docente.acciones.informacion', compact('p','estudiantes'));
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
        $mp=Proyecto::find($id); //Mi proyecto
        return view('docente.editar-proyecto',compact('cursos','tipos', 'mp'));
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
    public function getSubir($id)
    {
        $documentos=Documento::where('proyecto_id',$id)->lists('documentos.version','documentos.id');
        return view('docente.acciones.subir-datos',compact('documentos'));
    }
    public function getPdf($id)
    {
        //return "Esto es el PDF ".$id;
        $p=Proyecto::find($id);

        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $estudiantes=User::join('proyests','users.id','=','proyests.estudiante_id')->where('proyests.proyecto_id',$id)->select('users.*')->get();
        $view =  \View::make('pdf', compact('p','date','estudiantes'))->render();
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
