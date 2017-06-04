<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Estudiante;
use Auth;
use Input;
use Redirect;
use Carbon\Carbon;

class EstudianteController extends Controller
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
        return view('master.estudiante');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $po = User::find($id);
        
        $sexo=array('1'=>'Masculino',
                    '0'=>'Femenino');
        $estado=array('1'=>'Activo',
                      '0'=>'Inactivo');
        return view("master.editar.edestudiante",compact('po','sexo','estado'));
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
        $users=User::get(); //$docentes=Estudiante::get();              
        $usuario=User::find($id);
                //El dni tiene q ser único, por eso 1ro verificamos si cambio el dni
                if (Input::get('dni')!=$usuario->dni) {
                    $sensor=0;
                   foreach ($users as $user) {
                        if ($user->dni==Input::get('dni')) {
                            $sensor=1;
                        }
                   }
                   if ($sensor==1) {
                      $mensaje="El DNI ya está registrado por otro usuario";
                      return Redirect::to('adminestudiantes')->with('naranja', $mensaje);
                   }else{$usuario->dni = Input::get('dni');}
                }
                //El email tiene q ser único, por eso 2do verificamos si cambio el dni
                //return "BD: ".$usuario->email." <> get:".Input::get('email');
                if (Input::get('email')!=$usuario->email) {
                    $sensor=0;
                   foreach ($users as $user) {
                        if ($user->email==Input::get('email')) {
                            $sensor=1;
                        }
                   }
                   if ($sensor==1) {
                      $mensaje="El E-mail ya está registrado por otro usuario";
                      return Redirect::to('adminestudiantes')->with('naranja', $mensaje);
                   }else{$usuario->email = Input::get('email');}
                }

                //Luego llenamos lo demas 
                $file = Input::file('foto');
                if(!empty($file)){
                    $extencion=pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $name=$usuario->dni.".".$extencion;
                    $file->move('images', $name);
                    $usuario->foto=$name;
                }
                $usuario->nombres=$request->get('nombres');
                $usuario->apellidos=$request->get('apellidos');
                $usuario->sexo=$request->get('sexo');
                if ($request->get('pass')!='') {
                     $usuario->password=$request->get('pass');
                }
                $estudiante=Estudiante::find($usuario->id);
                $estudiante->f_ing=$request->get('f_ing');
                $estudiante->f_nac=$request->get('f_nac');
                $usuario->save();
                $estudiante->save();
    return back()->with('verde','Se actualizaron tus datos');

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
