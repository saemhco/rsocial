<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Documento;
use Redirect;
use App\User;
use App\Docente;
use App\Proyecto;
use Auth;
use Input;
use Carbon\Carbon;

class AdminDocenteController extends Controller
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
        $docentes=User::where('tipo','1')->where('solicitud','<>','1')->get();
        return view('admin.docentes.docentes',compact('docentes'));

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
                    return Redirect::to('admindocentes')->with('rojo', $mensaje);
                }
                if ($usuario->email==Input::get('email')) {
                    $mensaje='El email ya esta registrado por otro usuario';
                    return Redirect::to('admindocentes')->with('rojo', $mensaje);
                }
            }

        $u= new User;
        $u->nombres=$request->get('nombres');
        $u->apellidos=$request->get('apellidos');
        $u->dni=$request->get('dni');
        $u->email=$request->get('email');
        $u->estado=$request->get('estado');
        $u->sexo=$request->get('sexo');
        $u->tipo="1";
        $u->password="12345678";
        $u->save();
        $user=User::where('dni',$request->get('dni'))->first();
        $d= new Docente;
        $d->user_id=$user->id;
        $d->save();
        return Redirect::to('admindocentes')->with('verde','Se registró un nuevo docente');
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
        $d=User::find($id);
        $sexo=array('1'=>'Masculino',
                    '0'=>'Femenino');
        $estado=array('1'=>'Activo',
                      '0'=>'Inactivo');
        return view("admin.docentes.editar-docente",compact('d','sexo','estado'));
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
        $users=User::get(); $docentes=Docente::get();              
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
                      return Redirect::to('admindocentes')->with('naranja', $mensaje);
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
                      return Redirect::to('admindocentes')->with('naranja', $mensaje);
                   }else{$usuario->email = Input::get('email');}
                }

                //Luego llenamos lo demas 
                $usuario->nombres=$request->get('nombres');
                $usuario->apellidos=$request->get('apellidos');
                $usuario->sexo=$request->get('sexo');
                $usuario->estado=$request->get('estado');
                $usuario->password=$request->get('pass');
                $usuario->save();
    return Redirect::to('admindocentes')->with('verde','Se Actualzó correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //return $id;
    }
    public function getEliminar($id){
        $p=Proyecto::where('docente_id',$id)->get();
        if ($p=="[]") {
            $d=User::find($id);
            $d->delete();
        return Redirect::to('admindocentes')->with('verde','Se Eliminó correctamente');
        }else{
        return Redirect::to('admindocentes')->with('naranja','El docente registró proyectos, si lo elimina se perderán estos datos. Puede poner su estado en inactivo en: editar docente');
        }
        
    }
}
