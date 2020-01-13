<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TalentoDocenteController extends Controller
{
    public function __construct() {
        $this->middleware('talento');
  
      }
  
      public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda
  
     if($request){
      $query=trim($request->get('searchText'));
      $docentes=DB::table('docente as doc')->join('facultad as fac','doc.id_fac','=','fac.id_facultad')
      ->select('doc.id_docente','doc.nombre','doc.apellido','doc.documento','fac.nombre as facultad') 
      ->where('doc.nombre','LIKE','%'.$query.'%')
      ->orwhere('doc.documento','LIKE','%'.$query.'%')
      ->orwhere('fac.nombre','LIKE','%'.$query.'%')
      ->orderBy('doc.id_docente','desc')
      ->paginate(7);
      return view('talentohumano.docente.index',["docentes"=>$docentes,"searchText"=>$query]);
     }
    }
}
