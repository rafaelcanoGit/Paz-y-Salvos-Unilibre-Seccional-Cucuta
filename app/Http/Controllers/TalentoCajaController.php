<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TalentoCajaController extends Controller
{
    public function __construct() {
        $this->middleware('talento');
      }


    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

        if($request){
            $query=trim($request->get('searchText'));
            $docentes=DB::table('docente as doce')

            ->join('facultad as fac','doce.id_fac','=','fac.id_facultad')
            ->join('estadocaja as ecaja','doce.id_docente','=','ecaja.id_doc')
            
            ->select('doce.id_docente as id','doce.nombre as nombre','doce.apellido as apellido','doce.documento as documento','fac.nombre as facultad','ecaja.estado as estado','ecaja.updated_at as actualizado','ecaja.observacion as observacion')
           
            ->where('doce.nombre','LIKE','%'.$query.'%')
            ->orwhere('doce.apellido','LIKE','%'.$query.'%')
            ->orwhere('doce.documento','LIKE','%'.$query.'%')
            ->orwhere('fac.nombre','LIKE','%'.$query.'%')
            ->orderBy('doce.id_docente','desc')
            ->paginate(7);
            
            return view('talentohumano.estadocaja.index',["docentes"=>$docentes,"searchText"=>$query]);
           }



   }
}
