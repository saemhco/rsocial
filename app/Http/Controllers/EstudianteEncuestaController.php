<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Encuesta;
use App\Encuestae;
use App\Curso;
use App\Cursoee;
use Redirect;
use Auth;
use Input;
use Carbon\Carbon;

class EstudianteEncuestaController extends Controller
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
        $encuesta=Encuesta::where('estado','1')->orderBy('id','desc')->first();
        if($encuesta!=''){ //Si hay encuestas activas
            $ee=Encuestae::where('encuesta_id',$encuesta->id)->where('user_id',Auth::user()->id)->get(); //Encuesta estud
            if($ee!='[]'){
             $disabled= "disabled";
             $estado="return false";   
            }else{
                $disabled= "";
                 $estado="";
            }
        }else{             //No hay encuestas activas
            $disabled= "disabled";
            $estado="return false";
        }
        $mes=Encuestae::where('user_id',Auth::user()->id)->get();//Mis encuestas
        $respuestas=array('1' => 'Totalmente en desacuerdo',
                          '2' => 'En desacuerdo',
                          '3' => 'Parcialmente en desacuerdo',
                          '4' => 'Parcialmente de acuerdo',
                          '5' => 'De acuerdo',
                          '6' => 'Totalmente de acuerdo');
        return view('estudiantes.encuestas.encuestas',compact('encuesta','disabled','mes','estado','respuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encuesta=Encuesta::where('estado','1')->orderBy('id','desc')->first();
        if($encuesta!=''){ //Si hay encuestas activas
            $ee=Encuestae::where('encuesta_id',$encuesta->id)->where('user_id',Auth::user()->id)->get(); //Encuesta estud
            if($ee!='[]'){return back();}
        }else{             //No hay encuestas activas
            return back();
        }
        $respuestas=array('1' => 'Totalmente en desacuerdo',
                          '2' => 'En desacuerdo',
                          '3' => 'Parcialmente en desacuerdo',
                          '4' => 'Parcialmente de acuerdo',
                          '5' => 'De acuerdo',
                          '6' => 'Totalmente de acuerdo');
        $encuesta_id=$encuesta->id;
        $cursos=Curso::lists('curso','id');
        return view('estudiantes.encuestas.encuesta-nuevo',compact('respuestas','encuesta_id','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificamos que en verdad sea el usuario quien envió los datos de la encuesta
        if(Auth::user()->id!=$request->get('user_id')){
            return back();
        }
        
        $encuesta=Encuesta::where('estado','1')->orderBy('id','desc')->first();
        if($encuesta!=''){//Si hay encuestas activas
            $ee=Encuestae::where('encuesta_id',$encuesta->id)->where('user_id',Auth::user()->id)->get(); //Encuesta estud
            if($ee!='[]'){return Redirect::to('estudiantencuesta');}
        }else{             //No hay encuestas activas
             return Redirect::to('estudiantencuesta');
        }

        $ee = new Encuestae; //Encuesta para estudiante
        $ee->create($request->all());
        $miEncuesta=Encuestae::where('user_id',Auth::user()->id)
                    ->orderBy('id','desc')->select('id')->first();
        //Cursos docentes;
        foreach ($request->get('cursos') as $a) {
            $ce= new Cursoee;
            $ce->encuesta_id=$miEncuesta->id;
            $ce->curso_id=$a;  
            $ce->save();   
         } 
         
        return redirect('estudiantencuesta')->with('verde','Se registró su encuesta');
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
