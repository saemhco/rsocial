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

class ForosEstudianteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('estudiante');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $foros=Foro::join('proyectos','foros.proyecto_id','=','proyectos.id')
            ->join('proyests','proyests.proyecto_id','=','proyectos.id')
            ->where('proyests.estudiante_id',Auth::user()->id)
            ->where('foros.estado','1')
            ->select('foros.*')
            ->buscar($request->buscador)
            ->orderBy('foros.id', 'desc')->get();

        //Cursos para el estudiante,
        $cursos=Foro::join('proyectos','foros.proyecto_id','=','proyectos.id')
            ->join('cursos','cursos.id','=','proyectos.curso_id')
            ->join('proyests','proyests.proyecto_id','=','proyectos.id')
            ->where('proyests.estudiante_id',Auth::user()->id)
            ->where('foros.estado','1')->lists('cursos.curso','cursos.id');

        $pnf=Proyecto::join('proyests','proyests.proyecto_id','=','proyectos.id')
            ->where('proyests.estudiante_id',Auth::user()->id)
            ->lists('proyectos.titulo','proyectos.id');

        return view('estudiantes.foros.foros', compact('foros','cursos','pnf'));
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
              return Redirect::to('forosestudiantes')->with('rojo','Algo salió mal '); 
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

        return Redirect::to('forosestudiantes')->with('verde', 'Se registró un nuevo foro');
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
        return view('estudiantes.foros.foro', compact('foro','comentarios'));
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
        //
    }
}
