<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;
use Input;
use DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::logout();
        return Redirect::to('/');
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
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ])) {
             if (Auth::user()->estado==1){
                //return Redirect::to('');//->with('message','store');
                $mensaje = "ingresó correctamente";
                switch (Auth::user()->tipo) {
                    case 0:
                        return Redirect::to('admindocentes'); 
                        break;
                    case 1:
                        return Redirect::to('docenteproyecto');
                        break;
                    case 2:
                        return Redirect::to('estudianteproyecto');
                        break;
                    default:
                        return Redirect::to('/')->with('rojo', 'Algo salió mal');
                        break;
                }
             } else{
                $mensaje = "Su cuenta aún esta inactiva, pronto nos contactaremos con Ud. a su E-mail ".$request->get('email');
                    return Redirect::to('/')->with('rojo', $mensaje);
                }
            }
            else Auth::logout(); $mensaje = "Usuario o contraseña son incorrectos. Intente nuevamente";
             return Redirect::to('/')->with('rojo', $mensaje);

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
