<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisPazySalvos\Docente;
use sisPazySalvos\EstadoCaja;
use sisPazySalvos\Facultad;
use DB;


class ImportController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
      }

      
    public function index(){

         return view('sispazysalvos.docente.subir');
        }


public function store (){

    $file=Input::file('archivo');
    $file->storeAs('public', $file->getClientOriginalName());
    $path= storage_path('app/public/'.$file->getClientOriginalName());
 
    $lines=file($path);
    $utf8_lines= array_map('utf8_encode',$lines);
    $array = array_map('str_getcsv',$utf8_lines);
   
    
 for($i=1; $i<sizeof($array); ++$i){
     $row=$array[$i][0];
     $dato=explode(';',$row);
     $docente= new Docente;
     $docente->nombre=$dato[0];
     $docente->apellido=$dato[1];
     $docente->documento=$dato[2];
     $docente->id_fac=$this->idFacultad($dato[3]);
     $docente->save();

     $estadoCaja= new EstadoCaja;
       $estadoCaja->id_doc=$docente->id_docente;
       $estadoCaja->documento_doc=$docente->documento;
       $estadoCaja->estado='----';
       $estadoCaja->save(); 
     
 }
 return Redirect::to('sispazysalvos/docente');
}

public function idFacultad($nombre){


    $facultad=DB::table('facultad')->where('nombre',$nombre)->first();
    
    if($facultad){
        return $facultad->id_facultad;
    }
    else{
        $facultad = new Facultad;
        $facultad->nombre=$nombre;
        $facultad->save();
        return $facultad->id_facultad;
    }

}


}
