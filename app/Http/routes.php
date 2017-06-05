<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});


Route::resource('user','UserController');
Route::resource('log','LogController');

Route::resource('admin','AdminController');
Route::resource('adminestudiantes','AdminEstudianteController');
Route::controller('adminestudiante','AdminEstudianteController');
Route::controller('admindocente','AdminDocenteController');
Route::resource('admindocentes','AdminDocenteController');
Route::resource('adminproyectos','AdminProyectoController');
Route::controller('adminacciones','AdminProyectoController');
Route::resource('adminencuesta','AdminEncuestaController');
Route::get('excel/{id}','AdminEncuestaController@excel');

Route::resource('solicitudes','AdminSolicitudesController');
Route::get('solicitud/{id}','AdminSolicitudesController@update');

Route::resource('docente','DocenteController');
Route::resource('docenteproyecto','DocenteProyectoController');
Route::controller('docenteacciones','DocenteProyectoController');
Route::resource('documento','DocumentosController');
Route::get('documentoeliminar/{id}','DocumentosController@destroy');

Route::resource('estudiante','EstudianteController');
Route::resource('estudianteproyecto','EstudianteProyectoController');
Route::controller('estudianacciones','EstudianteProyectoController');
Route::resource('estudiantencuesta','EstudianteEncuestaController');

//Foros docente
Route::resource('foros','ForosController');
Route::resource('docentencuesta','DocenteEncuestaController');
Route::controller('miforo','ForosController');
//Foros estudiante
Route::resource('forosestudiantes','ForosEstudianteController');


Route::get('volver/{t}', function ($t) {
    if($t=='1'){
    	return Redirect::to('docenteproyecto');
    }else{return Redirect::to('estudianteproyecto');}
});


//Descagar archivos
Route::get('storage/{archivo}', ['middleware' => 'auth', function ($archivo) {
     $url = Storage_path('storage/foros/'.$archivo);
     if (Storage::exists('foros/'.$archivo))
     {
     	//return Storage_path($archivo);
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     return "No hay archivo";
}]);
Route::get('descargar/{archivo}', ['middleware' => 'auth', function ($archivo) {
     $url = Storage_path('documentos/'.$archivo);
     if (Storage::disk('doc')->has($archivo))
     {
     	//return Storage_path($archivo);
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     if(Auth::user()->tipo=='1'){
     return back()->with('naranja','no se encontro ningun documento, use la opcción \'actualizar archivo\' para volver a subir un nuevo archivo');
 	}else if(Auth::user()->tipo=='1'){
 		return back()->with('naranja','no se encontro ningun documento');
 	}
}]);
//Doc Adjuntos
    Route::get('rp_descargar/{archivo}', ['middleware' => 'auth', function ($archivo) {
         $url = Storage_path('storage/proyectos/registro/'.$archivo);
         if (Storage::exists('proyectos/registro/'.$archivo))
         {
            //return Storage_path($archivo);
           return response()->download($url);
         }
         //si no se encuentra lanzamos un error 404.
         return "No hay archivo";
    }]);
    Route::get('excel_descargar/{archivo}', ['middleware' => 'auth', function ($archivo) {
         $url = Storage_path('storage/proyectos/excel/'.$archivo);
         if (Storage::exists('proyectos/excel/'.$archivo))
         {
            //return Storage_path($archivo);
           return response()->download($url);
         }
         //si no se encuentra lanzamos un error 404.
         return "No hay archivo";
    }]);Route::get('evidencia_descargar/{archivo}', ['middleware' => 'auth', function ($archivo) {
         $url = Storage_path('storage/proyectos/evidencias/'.$archivo);
         if (Storage::exists('proyectos/evidencias/'.$archivo))
         {
            //return Storage_path($archivo);
           return response()->download($url);
         }
         //si no se encuentra lanzamos un error 404.
         return "No hay archivo";
    }]);