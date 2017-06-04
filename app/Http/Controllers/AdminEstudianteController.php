<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use App\User;
use App\Estudiante;
use App\Proyecto;
use App\Proyest;
use Auth;
use Input;
use Carbon\Carbon;

class AdminEstudianteController extends Controller
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
        $es=User::where('tipo','2')->where('solicitud','<>','1')->get();
        return view('admin.estudiantes.estudiantes',compact('es'));
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
        $usuarios=User::get();
            foreach ($usuarios as $usuario) {
                if ($usuario->dni==Input::get('dni')) {
                    $mensaje='El DNI ya esta registrado por otro usuario';
                    return Redirect::to('adminestudiantes')->with('rojo', $mensaje);
                }
                if ($usuario->email==Input::get('email')) {
                    $mensaje='El email ya esta registrado por otro usuario';
                    return Redirect::to('adminestudiantes')->with('rojo', $mensaje);
                }
            }

        $u= new User;
        $u->nombres=$request->get('nombres');
        $u->apellidos=$request->get('apellidos');
        $u->dni=$request->get('dni');
        $u->email=$request->get('email');
        $u->estado=$request->get('estado');
        $u->sexo=$request->get('sexo');
        $u->tipo="2";
        $u->password="12345678";
        $u->save();

        $user=User::where('dni',$request->get('dni'))->first();
        $e= new Estudiante;
        $e->user_id=$user->id;
        $e->f_nac=$request->get('f_nac');
        $e->f_ing=$request->get('f_ing');
        $e->save();
        return Redirect::to('adminestudiantes')->with('verde','Se registró un nuevo estudiante');
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
        return view("admin.estudiantes.editar-estudiante",compact('po','sexo','estado'));
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
                $usuario->nombres=$request->get('nombres');
                $usuario->apellidos=$request->get('apellidos');
                $usuario->sexo=$request->get('sexo');
                $usuario->estado=$request->get('estado');
                if ($request->get('pass')!='') {
                     $usuario->password=$request->get('pass');
                }
                $estudiante=Estudiante::find($usuario->id);
                $estudiante->f_ing=$request->get('f_ing');
                $estudiante->f_nac=$request->get('f_nac');
                $usuario->save();
                $estudiante->save();
    return Redirect::to('adminestudiantes')->with('verde','Se Actualzó correctamente');

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
    public function getEliminar($id){
        $p=Proyest::where('estudiante_id',$id)->get();
        if ($p=="[]") {
            $d=User::find($id);
            $d->delete();
        return Redirect::to('adminestudiantes')->with('verde','Se Eliminó correctamente');
        }else{
        return Redirect::to('adminestudiantes')->with('naranja','El estudiante registró proyectos, si lo elimina se perderán estos datos. Puede poner su estado en inactivo en: editar docente');
        }
        
    }
}
