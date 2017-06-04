<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Docente;
use App\Estudiante;
use App\Proyecto;
use Redirect;
use Auth;
use Input;
use Carbon\Carbon;
use Mail;

class AdminSolicitudesController extends Controller
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
        $users=User::where('estado','0')->where('solicitud','=','1')->get();
        return view('admin.solicitudes',compact('users'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $user=User::find($id);
      if($user->tipo=='1'){
        $d=new Docente;
        $d->user_id=$user->id;
        $d->save();
      }else if($user->tipo=='2'){
        $e=new Estudiante;
        $e->user_id=$user->id;
        $e->f_ing=Carbon::now();
        $e->f_nac=Carbon::now();
        $e->save();
      }else{
        return Redirect::to('solicitudes')->with('rojo','Algo salió mal, no se pudo agregar');
      }
      $user->estado='1';
      $user->solicitud='0';
      $password=str_random(8);
      $user->password=$password;
      $user->save();

      //Inicio Para el mail
        $destinatario=$user->email; //A quien le mandaremos
        $asunto="Confirmación de cuenta - wwww.proyectosenfermeria.com"; //El asunto que aparecerá en el correo
        $contenido="Usuario: <b>".$destinatario."</b><br>    
                                Contraseña: <b>".$password."<b/>";

        $data = array('contenido' => $contenido,'nombres'=>$user->nombres." ".$user->apellidos); //Tiene que ser arreglo, asi es la sintaxis

        //Aquí la función o metodo que nos permite enviar, ah tambien puede enviarse archivos, solo seria aumentar variablas al costado de $destinatario y luego especificarlo abajo, revisa la doc de laravel, ahí tambien está
        $r= Mail::send('admin.solicitud-confirmacion-email', $data, function ($message) use ($asunto,$destinatario) {
                        $message->from('recursosenfermeriaunheval@gmail.com', 'Enfermería-UNHEVAL');
                        $message->to($destinatario)->subject($asunto);
                       
                    });
        //---------------------------------------------------------------------------    
        if ($r) {
              return Redirect::to('solicitudes')->with('verde','Se registró un nuevo usuario. Enviamos un correo a '.$user->email);
             }     
        else{
          if($user->tipo=='1'){
            Docente::destroy($user->id);
          }else if($user->tipo=='2'){
                  Estudiante::destroy($user->id);
          }
            $user->solicitud='1';
            $user->estado='0';
          return Redirect::to('solicitudes')->with('rojo','No se pudo enviar el correo de confirmación, Verifique su velocidad de internet');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u=User::find($id);
        $asunto='Registro a la plataforma: \'wwww.proyectosenfermeria.com\'';
        $destinatario=$u->email;
        $data = array('contenido' => $u->nombres." ".$u->apellidos);
        $r=Mail::send('admin.solicitud-rechazo-email',$data, function ($message) use ($asunto,$destinatario) {
            $message->from('recursosenfermeriaunheval@gmail.com', 'Enfermería-UNHEVAL');
            $message->to($destinatario)->subject($asunto);
        });
         //-------------------------------------------------------------------------    
        if ($r) {
            User::destroy($id);
              return Redirect::to('solicitudes')->with('verde','Se eliminó la solicitud del usuario. Enviamos un correo a '.$destinatario);
             }     
        else{
            User::destroy($id);
          return Redirect::to('solicitudes')->with('naranja',' Se eliminó la solicitud del usuario pero no se pudo enviar el correo, Verifique su velocidad de internet');
        }

    }
}
