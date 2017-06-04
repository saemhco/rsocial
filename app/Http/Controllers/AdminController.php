<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Redirect;
use Input;
use Carbon\Carbon;
class AdminController extends Controller
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
        return view('master.admin');
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
        return User::find($id);
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
        $user=User::find(Auth::user()->id);
        $users=User::get();
        $user->nombres=Input::get('nombres');
        $user->apellidos=Input::get('apellidos');
        if (Input::get('email')!=$user->email) {
                    $sensor=0;
                   foreach ($users as $us) {
                        if ($us->email==Input::get('email')) {
                            $sensor=1;
                        }
                   }
                   if ($sensor==1) {
                      $mensaje="El E-mail ya está registrado por otro usuario";
                      return Redirect::to('admin')->with('naranja', $mensaje);
                   }else{$user->email = Input::get('email');}
        }

        $file = Input::file('foto');
        if(!empty($file)){
             $extencion=pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $name=$user->dni.".".$extencion;
                    $file->move('images', $name);
                    $user->foto=$name;
        }
        $user->email=Input::get('email');
        if(Input::get('password')!=""){
        $user->password=Input::get('password');   
        }
        $user->save();
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
