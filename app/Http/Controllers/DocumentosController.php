<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use App\Documento;
use Redirect;
use Auth;
use Input;
use Validator;
use Storage;
use Carbon\Carbon;

class DocumentosController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('docente');
    }
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
        //return $request->all();
        $p=Proyecto::find($request->get('proyecto'));
        $version=1;
        if ($p->documentos!="[]") {
            foreach($p->documentos as $mp) {
                $version++;
            }
        }

        $file = Input::file('documento');
          if(!empty($file)){
            //tamaño del archivo en kBytes
            $condiciones= array('documento' => 'max:3072' );
            $validator=Validator::make(Input::all(),$condiciones);
            if ($validator->fails()) {
              return back()->withErrors($validator);
            }else{
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $name=$p->id."-".$p->titulo."-v".$version.".".$extension;
                //utf8_decode($name)
              if(Storage::disk('doc')->put($name,  \File::get($file)) ){
                $d= new Documento;
                $d->proyecto_id=$p->id;
                $d->version=$version;
                $d->archivo=$name;
                $d->save();
                return Redirect::to('docenteproyecto')
                ->with('verde','Se registró un nuevo documento');
              }else{
                return Redirect::to('docenteproyecto')->with('rojo','Algo salió mal '); 
              }
            }
          }else{
                return Redirect::to('docenteproyecto')->with('rojo','Algo salió mal');
          }



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
    //return $request->all();
    $d= Documento::find($request->get('documento')); //Documento
    $version=$d->version;
    $p= Proyecto::find($d->proyecto_id); //Proyecto
    $file = Input::file('archivo');
        if(!empty($file)){
            //tamaño del archivo en kBytes
            $condiciones= array('archivo' => 'max:3072' );
            $validator=Validator::make(Input::all(),$condiciones);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }else{
                $extension = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
                $name=$p->id."-".$p->titulo."-v".$version.".".$extension;
                //Antes de almacenar eliminaremos el archivo
                Storage::disk('doc')->delete($d->archivo );
                if(Storage::disk('doc')->put($name,  \File::get($file)) ){
                    //$request->file('archivo')->store('public');
                    $d->version="";
                    $d->archivo=$name;
                    $d->save();
                    //Limpiamos y volvemos a colocar la versión, para conseguir un cambio en el updated_at
                    $d->version=$version;
                    $d->save();
                    return Redirect::to('docenteproyecto')
                    ->with('verde','Se Actualizó correctamente');
                }else{
                    return Redirect::to('docenteproyecto')
                    ->with('rojo','Algo salió mal ');
                }
            }
               
        }else{
            return Redirect::to('docenteproyecto')->with('rojo','Algo salió mal ');
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
      if (Proyecto::find($id)->docente_id!=Auth::user()->id) {
        return Redirect::to('docenteproyecto')->with('naranja','Solo puede eliminar sus proyectos');
      }
        $ds=Documento::where('proyecto_id',$id)->get();
        foreach($ds as $d){
            if(Storage::disk('doc')->has($d->archivo)){
                Storage::disk('doc')->delete($d->archivo );
                Documento::destroy($d->id);  
            }
        }
        Proyecto::destroy($id);
        return Redirect::to('docenteproyecto')->with('verde','Elimino el proyecto');
    }
}
