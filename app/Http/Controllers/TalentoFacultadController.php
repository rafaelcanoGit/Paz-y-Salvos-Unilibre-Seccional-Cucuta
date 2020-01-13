<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TalentoFacultadController extends Controller
{
    public function __construct() {
        $this->middleware('talento');
      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   if($request){
    
    $facultades=DB::table('facultad')
    ->orderBy('id_facultad','asc')
    ->paginate(7); 
    return view('talentohumano.facultad.index',["facultades"=>$facultades]);
   }

    }
}
