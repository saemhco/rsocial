<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Redirect;
use Auth;
use Carbon\Carbon;
use App\Foro;
use App\Frespuesta;
use App\Proyecto;
use Input;
use Validator;
use Storage;

class ForosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('docente',['except' => ['getXcurso','postFrespuesta']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $foros=Foro::join('proyectos','foros.proyecto_id','=','proyectos.id')
            ->where('proyectos.docente_id',Auth::user()->id)
            ->buscar($request->buscador)
            ->select('foros.*')
            ->orderBy('foros.id', 'desc')
            ->get();
        //Cursos para el docete , cambia el where,
        $cursos=Foro::join('proyectos','foros.proyecto_id','=','proyectos.id')->join('cursos','cursos.id','=','proyectos.curso_id')
            ->where('proyectos.docente_id',Auth::user()->id)
            ->where('foros.estado','1')->lists('cursos.curso','cursos.id');
         //Proyectos para el nuevo foro   
        $pnf=Proyecto::where('docente_id',Auth::user()->id)->lists('titulo','id');

        return view('docente.foros', compact('foros','cursos','pnf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //obtenemos el campo file definido en el formulario
        $file = Input::file('archivo');
    if(!empty($file)){
        //tamaño del archivo en kBytes
            $condiciones= array('archivo' => 'max:3072' );
            $validator=Validator::make(Input::all(),$condiciones);
            if ($validator->fails()){
              return back()->withErrors($validator);
            }else{
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $nombre=Carbon::now()->second.$request->get('titulo').'.'.$extension;

              if(!(\Storage::disk('local')->put('foros/'.$nombre,  \File::get($file)) )){
              return Redirect::to('foros')->with('rojo','Algo salió mal '); 
              }
            }
    }else{
        $nombre="";
    }

        $f=new Foro;
        $f->proyecto_id=$request->get('pnf');
        $f->user_id=Auth::user()->id;
        $f->titulo=$request->get('titulo');
        $f->contenido=$request->get('contenido-n');
        $f->archivo=$nombre;
        $f->estado='1';
        $f->save();

        return Redirect::to('foros')->with('verde', 'Se registró un nuevo foro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foro=Foro::find($id);
        $comentarios=Frespuesta::where('foro_id',$id)->get();
        return view('docente.foro', compact('foro','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foro=Foro::find($id);
        //Solo el docente puede eliminar
        if (Auth::user()->id == $foro->proyecto->docente_id){
            //Si tiene archivo, primero se elimina
            
            if($foro->archivo!=''){
                if (Storage::delete('foros/'.$foro->archivo)) {
                    Foro::destroy($id);
                    return Redirect::to('foros')
                        ->with('verde','Se eliminó el foro'); 
                }else{
                   return Redirect::to('foros')
                    ->with('naranja','El archivo no se pudo eliminar'); 
                }
            }else{
                Foro::destroy($id);
                    return Redirect::to('foros')->with('verde','Se eliminó el foro'); 
            }
        }else{
            return Redirect::to('foros')
                ->with('naranja','Ud. no puede eliminar este foro');
        }
    }
    public function postFrespuesta(){
    //return Input::get('descr');
             $rs = new Frespuesta;
             $rs->foro_id = Input::get('idforo');
             $rs->user_id = Auth::user()->id;
             $rs->respuesta = Input::get('comentario');
             $rs->save();
             switch (Auth::user()->tipo) {
                 case '1': return Redirect::to('foros/'.Input::get('idforo'));
                            break;
                 case '2': return Redirect::to('forosestudiantes/'.Input::get('idforo'));
                            break;
             }
            
    }
    public function getXcurso($id){
        //Ruta
        switch (Auth::user()->tipo) {
                 case '1': $ruta='foros/'.Input::get('idforo');
                            break;
                 case '2':  $ruta='forosestudiantes/'.Input::get('idforo');
                            break;
             }
        //Aquí lo bueno
        $foros=Foro::join('proyectos','proyectos.id','=','foros.proyecto_id')
                    ->join('cursos','cursos.id','=','proyectos.curso_id')
                    ->where('cursos.id',$id)
                    ->select('foros.*')->orderBy('foros.id', 'desc')->get();
        if ($foros=='[]') {
            return Redirect::to($ruta); //Aunq si lo piensas esta linea es innecesaria, xq todos los valores q lleguen aquí serán válidos
        }else{
        return view('docente.foros-xcurso', compact('foros'));
        }
    }

}
