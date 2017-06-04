<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Redirect;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                if ($usuario->dni==$request->get('dni')) {
                    $mensaje='El DNI ya esta registrado por otro usuario';
                    return Redirect::to('/')->with('rojo', $mensaje);
                }
                if ($usuario->email==$request->get('email')) {
                    $mensaje='El E-mail ya esta registrado por otro usuario';
                    return Redirect::to('/')->with('rojo', $mensaje);
                }
            }

        $u=new User;
        $u->nombres=$request->nombres;
        $u->apellidos=$request->apellidos;
        $u->nombres=$request->nombres;
        $u->dni=$request->dni;
        $u->email=$request->email;
        $u->nombres=$request->nombres;
        $u->sexo=$request->sexo;
        $u->tipo=$request->tipo;
        $u->estado='0';
        $u->solicitud='1';
        $u->save();
       // $usuario=DB::table('users')->get();
        return Redirect::to('/')->with('verde','Se registró correctamente, estamos verificando sus datos, pronto nos contactaremos con Ud. a su E-mail '.$request->email);
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
