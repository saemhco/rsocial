<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Docente;
use App\Encuesta;
use App\Encuestad;
use App\Encuestae;
use Auth;
use Input;
use DB;
use Redirect;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AdminEncuestaController extends Controller
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
        $enc=Encuesta::orderBy('id','desc')->get();
        return view('admin.encuestas.encuestass',compact('enc'));
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
      $enc=new Encuesta;
      $enc->semestre=$request->get('semestre');
      $enc->estado='1';
      $enc->save();
      return Redirect::to('adminencuesta')->with('verde','Se creó una nueva encuesta');
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
        $encuesta=Encuesta::find($id);
        return view('admin.encuestas.encuesta-editar',compact('encuesta'));
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
        $enc=Encuesta::find($id);

       
        $input = Input::all();
        $enc->fill($input)->save();

        return Redirect::to('adminencuesta');
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
    public function excel($id){
        $encuesta=Encuesta::find($id);
        $titulo="Encuesta ".Carbon::parse($encuesta->created_at)->format('Y').'-'.$encuesta->semestre;
        Excel::create($titulo, function($excel) use($id) {
            

            $excel->sheet('Docentes', function($sheet) use($id) {
            //------------Elementos para el contenido ----------------------------------

              //Arreglos-Datos
              $eds=Encuestad::where('encuesta_id',$id)->get();
              $nt_docentes=User::where('tipo','1')->where('estado','1')
              ->select(DB::raw('count(*) as cont'))->first();
              //Dimencion 1: Campus responsable, declaramos variables, $dim_i[preg][resp]
              $dim_i = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <20 ; $i++) { 
                    array_push ( $dim_i , array(0,0,0,0,0,0) );
                }
              //Dimencion 2: Formación profesional y ciudadana, declaramos variables, $dim_ii[preg][resp]
              $dim_ii = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <10 ; $i++) { 
                    array_push ( $dim_ii , array(0,0,0,0,0,0) );
                }
              //Dimencion 3: Gestión social del conocimiento encuesta para docentes investigadores, declaramos variables, $dim_ii[preg][resp]
              $dim_iii = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <20 ; $i++) { 
                    array_push ( $dim_iii , array(0,0,0,0,0,0) );
                }

              //
              $t_docentes=0; 
              $romano=array('i','ii','iii','iv','v','vi','vii','viii','ix','x','xi','xii','xiii','xiv','xv','xvi','xvii','xviii','xix','xx','xxi','xxii','xxiii');
              foreach ($eds as $ed) {
                //Dimencion 1 $dim_i
                for ($i=0; $i <20 ; $i++) { 
                  $pregunta='ed_i_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_i[$i][0]++; break;
                    case '2': $dim_i[$i][1]++; break;
                    case '3': $dim_i[$i][2]++; break;
                    case '4': $dim_i[$i][3]++; break;
                    case '5': $dim_i[$i][4]++; break;
                    case '6': $dim_i[$i][5]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 2 $dim_ii
                for ($i=0; $i <10 ; $i++) { 
                  $pregunta='ed_ii_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_ii[$i][0]++; break;
                    case '2': $dim_ii[$i][1]++; break;
                    case '3': $dim_ii[$i][2]++; break;
                    case '4': $dim_ii[$i][3]++; break;
                    case '5': $dim_ii[$i][4]++; break;
                    case '6': $dim_ii[$i][5]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 3 $dim_iii
                for ($i=0; $i <20 ; $i++) { 
                  $pregunta='ed_iii_'.$romano[$i];
                  switch ($ed->$pregunta) {
                    case '1': $dim_iii[$i][0]++; break;
                    case '2': $dim_iii[$i][1]++; break;
                    case '3': $dim_iii[$i][2]++; break;
                    case '4': $dim_iii[$i][3]++; break;
                    case '5': $dim_iii[$i][4]++; break;
                    case '6': $dim_iii[$i][5]++; break;                    
                    default: break;
                  }
                }
                    $t_docentes++;
              }
            //------------------Fin de Datos----------------------------
                    // Cabecera
                    $sheet->mergeCells('A1:H1');
                    $sheet->cells('A1:H200', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                    });

                    $sheet->row(1, array(
                         'RESULTADO POR DIMENCIONES Y PREGUNTAS - DOCENTES'
                    ));
                    $sheet->appendRow(2, array(
                        'Dimenciones','Preguntas','% Totalmente en desacuerdo', '% En desacuerdo', '% Parcialmente en desacuerdo','% Parcialmente de acuerdo','% De acuerdo','% Totalmente de acuerdo'
                    ));
                    //Cuerpo 
                    //Dimención 1
                    $sheet->mergeCells('A3:A22'); //Combinamos la 1ra columna de dimenc
                    if($t_docentes<1){
                      $t_docentes=1;
                    }
                    for ($i=0; $i <20 ; $i++) { 
                    $sheet->appendRow(($i+3), array(
                        'Campus responsable','P'.($i+1),round(100*$dim_i[$i][0]/$t_docentes,2),round(100*$dim_i[$i][1]/$t_docentes,2),round(100*$dim_i[$i][2]/$t_docentes,2),round(100*$dim_i[$i][3]/$t_docentes,2),round(100*$dim_i[$i][4]/$t_docentes,2),round(100*$dim_i[$i][5]/$t_docentes,2)
                    ));
                    }
                    //Dimención 2
                    $sheet->mergeCells('A23:A32');
                    for ($i=0; $i <10 ; $i++) { 
                    $sheet->appendRow(($i+23), array(
                        'Formación profesional y ciudadana','P'.($i+1),round(100*$dim_ii[$i][0]/$t_docentes,2),round(100*$dim_ii[$i][1]/$t_docentes,2),round(100*$dim_ii[$i][2]/$t_docentes,2),round(100*$dim_ii[$i][3]/$t_docentes,2),round(100*$dim_ii[$i][4]/$t_docentes,2),round(100*$dim_ii[$i][5]/$t_docentes,2)
                    ));
                    }
                    //Dimención 3
                    $sheet->mergeCells('A33:A52');
                    for ($i=0; $i <20 ; $i++) { 
                    $sheet->appendRow(($i+33), array(
                        'Gestión social del conocimiento','P'.($i+1),round(100*$dim_iii[$i][0]/$t_docentes,2),round(100*$dim_iii[$i][1]/$t_docentes,2),round(100*$dim_iii[$i][2]/$t_docentes,2),round(100*$dim_iii[$i][3]/$t_docentes,2),round(100*$dim_iii[$i][4]/$t_docentes,2),round(100*$dim_iii[$i][5]/$t_docentes,2)
                    ));
                    }
                    //Pie
                    $sheet->appendRow(55, array(
                        '','','N° Docentes encuestados =',$t_docentes
                    ));
                    $sheet->appendRow(56, array(
                        '','','N° Docentes NO encuestados =',($nt_docentes->cont-$t_docentes)
                    ));
                    $sheet->appendRow(57, array(
                        '','','Total =',$nt_docentes->cont
                    ));
                    //Estilos----------------------------------------------------
                    $sheet->setBorder('A1:H52', 'thin'); //Bordes
                    $sheet->cells('A1:H2', function($cells) {
                        $cells->setBackground('#A9D0F5'); //Color de fondo
                        // Set font
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            //'size'       => '16',
                            'bold'       =>  true
                        ));
                    });
                    $sheet->cells('A1:H1', function($cells) {
                        $cells->setFontSize(16);
                    });
                    //$sheet->setAllBorders('thin');
                    $sheet->cells('A3:H22', function($cells) {
                        $cells->setBackground('#F5FFFA'); //Color de fondo dim 1
                    });
                    $sheet->cells('A23:H32', function($cells) {
                        $cells->setBackground('#E6E6FA'); //Color de fondo dim 2
                    });
                    $sheet->cells('A33:H52', function($cells) {
                        $cells->setBackground('#F0FFFF'); //Color de fondo dim 3
                    });
                    $sheet->cells('C55:C57', function($cells) {
                        $cells->setBackground('#ffff00'); //Color de fondo Pie
                        $cells->setFontSize(14);
                        $cells->setAlignment('right'); //ALineación Horizontal
                    });
                    $sheet->cells('D55:D57', function($cells) {
                        $cells->setBackground('#ffff00'); //Color de fondo Pie
                        $cells->setFontSize(14);
                        $cells->setAlignment('left'); //ALineación Horizontal
                    });
                    // Manipulate 2nd row
                    

                    // Append row as very last
                    
            //----------------------------------------------
            
            });

      //----------------Hoja 2--------------------------------------
            $excel->sheet('Estudiantes', function($sheet) use($id) {
            //------------Elementos para el contenido ----------------------------------
              //Arreglos-Datos
              $ees=Encuestae::where('encuesta_id',$id)->get();
              $nt_estudiantes=User::where('tipo','2')->where('estado','1')
              ->select(DB::raw('count(*) as cont'))->first();
              //Dimencion 1: Campus responsable, declaramos variables, $dim_i[preg][resp]
              $dim_i = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <18 ; $i++) { 
                    array_push ( $dim_i , array(0,0,0,0,0,0) );
                }
              //Dimencion 2: Formación profesional y ciudadana, $dim_ii[preg][resp]
              $dim_ii = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <10 ; $i++) { 
                    array_push ( $dim_ii , array(0,0,0,0,0,0) );
                }
              //Dimencion 3: Participación social, $dim_ii[preg][resp]
              $dim_iii = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <23 ; $i++) { 
                    array_push ( $dim_iii , array(0,0,0,0,0,0) );
                }
              //Dimencion 4: Formación profesional y ciudadana, $dim_ii[preg][resp]
              $dim_iv = array(array(0,0,0,0,0,0)  );
                for ($i=0; $i <10 ; $i++) { 
                    array_push ( $dim_iv , array(0,0,0,0,0,0) );
                }
              //
              $t_estudiantes=0; 
              $romano=array('i','ii','iii','iv','v','vi','vii','viii','ix','x','xi','xii','xiii','xiv','xv','xvi','xvii','xviii','xix','xx','xxi','xxii','xxiii');
              foreach ($ees as $ee) {
                //Dimencion 1 $dim_i
                for ($i=0; $i <18 ; $i++) { 
                  $pregunta='ee_i_'.$romano[$i];
                  switch ($ee->$pregunta) {
                    case '1': $dim_i[$i][0]++; break;
                    case '2': $dim_i[$i][1]++; break;
                    case '3': $dim_i[$i][2]++; break;
                    case '4': $dim_i[$i][3]++; break;
                    case '5': $dim_i[$i][4]++; break;
                    case '6': $dim_i[$i][5]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 2 $dim_ii
                for ($i=0; $i <10 ; $i++) { 
                  $pregunta='ee_ii_'.$romano[$i];
                  switch ($ee->$pregunta) {
                    case '1': $dim_ii[$i][0]++; break;
                    case '2': $dim_ii[$i][1]++; break;
                    case '3': $dim_ii[$i][2]++; break;
                    case '4': $dim_ii[$i][3]++; break;
                    case '5': $dim_ii[$i][4]++; break;
                    case '6': $dim_ii[$i][5]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 3 $dim_iii
                for ($i=0; $i <23 ; $i++) { 
                  $pregunta='ee_iii_'.$romano[$i];
                  switch ($ee->$pregunta) {
                    case '1': $dim_iii[$i][0]++; break;
                    case '2': $dim_iii[$i][1]++; break;
                    case '3': $dim_iii[$i][2]++; break;
                    case '4': $dim_iii[$i][3]++; break;
                    case '5': $dim_iii[$i][4]++; break;
                    case '6': $dim_iii[$i][5]++; break;                    
                    default: break;
                  }
                }
                //Dimencion 3 $dim_iii
                for ($i=0; $i <10 ; $i++) { 
                  $pregunta='ee_iii_'.$romano[$i];
                  switch ($ee->$pregunta) {
                    case '1': $dim_iv[$i][0]++; break;
                    case '2': $dim_iv[$i][1]++; break;
                    case '3': $dim_iv[$i][2]++; break;
                    case '4': $dim_iv[$i][3]++; break;
                    case '5': $dim_iv[$i][4]++; break;
                    case '6': $dim_iv[$i][5]++; break;                    
                    default: break;
                  }
                }
                    $t_estudiantes++;
              }
            //------------------Fin de Datos----------------------------
            // Cabecera
                    $sheet->mergeCells('A1:H1');
                    $sheet->cells('A1:H200', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                    });

                    $sheet->row(1, array(
                         'RESULTADO POR DIMENCIONES Y PREGUNTAS - ESTUDIANTES'
                    ));
                    $sheet->appendRow(2, array(
                        'Dimenciones','Preguntas','% Totalmente en desacuerdo', '% En desacuerdo', '% Parcialmente en desacuerdo','% Parcialmente de acuerdo','% De acuerdo','% Totalmente de acuerdo'
                    ));
            //Cuerpo 
                    //Dimención 1
                    $sheet->mergeCells('A3:A20'); //Combinamos la 1ra columna de dimenc
                    if($t_estudiantes<1){
                      $t_estudiantes=1;
                    }
                    for ($i=0; $i <18 ; $i++) { 
                    $sheet->appendRow(($i+3), array(
                        'Campus responsable','P'.($i+1),round(100*$dim_i[$i][0]/$t_estudiantes,2),round(100*$dim_i[$i][1]/$t_estudiantes,2),round(100*$dim_i[$i][2]/$t_estudiantes,2),round(100*$dim_i[$i][3]/$t_estudiantes,2),round(100*$dim_i[$i][4]/$t_estudiantes,2),round(100*$dim_i[$i][5]/$t_estudiantes,2)
                    ));
                    }
                    //Dimención 2
                    $sheet->mergeCells('A21:A30');
                    for ($i=0; $i <10 ; $i++) { 
                    $sheet->appendRow(($i+21), array(
                        'Formación profesional y ciudadana','P'.($i+1),round(100*$dim_ii[$i][0]/$t_estudiantes,2),round(100*$dim_ii[$i][1]/$t_estudiantes,2),round(100*$dim_ii[$i][2]/$t_estudiantes,2),round(100*$dim_ii[$i][3]/$t_estudiantes,2),round(100*$dim_ii[$i][4]/$t_estudiantes,2),round(100*$dim_ii[$i][5]/$t_estudiantes,2)
                    ));
                    }
                    //Dimención 3
                    $sheet->mergeCells('A31:A53');
                    for ($i=0; $i <23 ; $i++) { 
                    $sheet->appendRow(($i+31), array(
                        'Participación social','P'.($i+1),round(100*$dim_iii[$i][0]/$t_estudiantes,2),round(100*$dim_iii[$i][1]/$t_estudiantes,2),round(100*$dim_iii[$i][2]/$t_estudiantes,2),round(100*$dim_iii[$i][3]/$t_estudiantes,2),round(100*$dim_iii[$i][4]/$t_estudiantes,2),round(100*$dim_iii[$i][5]/$t_estudiantes,2)
                    ));
                    }
                    //Dimención 4
                    $sheet->mergeCells('A54:A63');
                    for ($i=0; $i <10 ; $i++) { 
                    $sheet->appendRow(($i+54), array(
                        'Formación profesional y ciudadana','P'.($i+1),round(100*$dim_iv[$i][0]/$t_estudiantes,2),round(100*$dim_iv[$i][1]/$t_estudiantes,2),round(100*$dim_iv[$i][2]/$t_estudiantes,2),round(100*$dim_iv[$i][3]/$t_estudiantes,2),round(100*$dim_iv[$i][4]/$t_estudiantes,2),round(100*$dim_iv[$i][5]/$t_estudiantes,2)
                    ));
                    }

                    //Pie
                    $sheet->appendRow(65, array(
                        '','','N° Estudiantes encuestados =',$t_estudiantes
                    ));
                    $sheet->appendRow(66, array(
                        '','','N° Estudiantes NO encuestados =',($nt_estudiantes->cont-$t_estudiantes)
                    ));
                    $sheet->appendRow(67, array(
                        '','','Total =',$nt_estudiantes->cont
                    ));
                    //Estilos----------------------------------------------------
                    $sheet->setBorder('A1:H63', 'thin'); //Bordes
                    $sheet->cells('A1:H2', function($cells) {
                        $cells->setBackground('#A9D0F5'); //Color de fondo
                        // Set font
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            //'size'     => '16',
                            'bold'       =>  true
                        ));
                    });
                    $sheet->cells('A1:H1', function($cells) {
                        $cells->setFontSize(16);
                    });
                    //$sheet->setAllBorders('thin');
                    $sheet->cells('A3:H20', function($cells) {
                        $cells->setBackground('#F5FFFA'); //Color de fondo dim 1
                    });
                    $sheet->cells('A21:H30', function($cells) {
                        $cells->setBackground('#E6E6FA'); //Color de fondo dim 2
                    });
                    $sheet->cells('A31:H53', function($cells) {
                        $cells->setBackground('#F0FFFF'); //Color de fondo dim 3
                    });
                    $sheet->cells('A54:H63', function($cells) {
                        $cells->setBackground('#ffffb3'); //Color de fondo dim 4
                    });
                    $sheet->cells('C65:C67', function($cells) {
                        $cells->setBackground('#ffff00'); //Color de fondo Pie
                        $cells->setFontSize(14);
                        $cells->setAlignment('right'); //ALineación Horizontal
                    });
                    $sheet->cells('D65:D67', function($cells) {
                        $cells->setBackground('#ffff00'); //Color de fondo Pie
                        $cells->setFontSize(14);
                        $cells->setAlignment('left'); //ALineación Horizontal
                    });
                    // Manipulate 2nd row

            $sheet->setOrientation('landscape');
            });

      //----------------Hoja 3--------------------------------------
            $excel->sheet('No encuestados', function($sheet) use($id) {
            //------------Elementos para el contenido ----------------------------------

            //------------Fin Elementos para el contenido-------------------------------
              // Cabecera
                    $sheet->mergeCells('B2:G2');
                    $sheet->cells('B2:G3', function($cells) {
                        $cells->setAlignment('center'); //ALineación Horizontal
                        $cells->setValignment('center');//Alineacion vertical
                    });

                    $sheet->row(2, array(
                         '','Lista de No encuestados'
                    ));
                    $sheet->appendRow(3, array(
                        '','N°','DNI','Nombres','Apellidos', 'E-mail','Tipo'
                    ));
              //Cuerpo
                    $usuarios=User::where('estado','1')->where('tipo','<>','0')
                    ->orderBy('tipo','desc')->get();
                    $eds=Encuestad::where('encuesta_id',$id)->get();
                    $ees=Encuestae::where('encuesta_id',$id)->get();
                    $fila=4;
                    foreach ($usuarios as $u) {
                      $sensor=0;
                      foreach ($eds as $ed) {//Recorremos todo los docentes
                        if (($ed->user_id==$u->id) || 
                     !($ed->encuesta->updated_at > $u->created_at) ) { //Si respondio encuesta se activa
                          $sensor=1;
                        }
                      }
                      foreach ($ees as $ee) { //Recorremos todo los estud
                        if (($ee->user_id==$u->id) || 
                         !($ee->encuesta->updated_at > $u->created_at) ){ //Si respondio encuesta se activa
                          $sensor=1;
                        }
                      }
                      if ($sensor==0) { //Solo imprimimos en caso no se halla activado
                        if($u->tipo=='1'){$tipo="Docente";}
                        else {$tipo="Estudiante";}
                          $sheet->appendRow($fila, array('',($fila-3),$u->dni,$u->nombres,$u->apellidos,$u->email,$tipo
                          ));
                          $fila++;
                      }
                    }

              //Estilos----------------------------------------------------
                    $sheet->setBorder('B2:G'.($fila-1), 'thin'); //Bordes
                    $sheet->cells('B2:G3', function($cells) {
                        $cells->setBackground('#A9D0F5'); //Color de fondo
                        // Set font
                        $cells->setFont(array(
                            'family'     => 'Calibri',
                            //'size'     => '16',
                            'bold'       =>  true
                        ));
                    });
                    $sheet->cells('B2:G2', function($cells) {
                        $cells->setFontSize(16);
                    });
              });

        })->export('xls');
    }
}
