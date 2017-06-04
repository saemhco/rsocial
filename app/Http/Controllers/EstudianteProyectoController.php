<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyecto;
use App\Documento;
use App\User;
use Redirect;
use Auth;
use Carbon\Carbon;

class EstudianteProyectoController extends Controller
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
    public function index()
    {
        $cursos=\App\Curso::lists('curso','id');
        $proyectos=Proyecto::join('proyests','proyests.proyecto_id','=','proyectos.id')
        ->where('proyests.estudiante_id',Auth::user()->id)
        ->select('proyectos.*')->get();
        return view('estudiantes.proyectos.proyectos',compact('cursos','proyectos'));
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
        //
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
