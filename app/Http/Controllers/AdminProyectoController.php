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

class AdminProyectoController extends Controller
{
        public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cursos=\App\Curso::lists('curso','id');
        $proyectos=Proyecto::get();
        return view('admin.proyectos.proyectos',compact('cursos','proyectos'));
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
        //Editar obs
       $o= Proyecto::find($id);
        return view('admin.proyectos.obs',compact('o'));
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
        $p= Proyecto::find($id);
        $p->obs=$request->get('obs');
        $p->save();
        return Redirect::to('adminproyectos')->with('verde','Se Actualizó correctamente');
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
        public function getPdf($id)
    {
        //return "Esto es el PDF";
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
}
