<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Docente;

use DB;

class CajaController extends Controller
{
    public function __construct() {
        $this->middleware('caja');
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
            
            return view('caja.docente.index',["docentes"=>$docentes,"searchText"=>$query]);
           }

   }

   
   public function show($id){ 
    $docente=Docente::findorFail($id);
    $estadosDocente=DB::table('estado_docente as edoc')

            ->join('pazysalvo as pys','edoc.id_pazys','=','pys.id_pazysalvo' )
            
            ->join('dependencia as dep','pys.id_dep','=','dep.id_dependencia')
            ->join('periodo_academico as per','pys.id_per','=','per.id_periodoac')
             
            ->where('edoc.id_doc','=',$id)

            ->select('per.ano as ano','per.periodo as periodo','dep.nombre as dependencia','edoc.estado as estado','edoc.observacion as observacion')
          
            ->orderBy('edoc.id_estado_doc','desc')
            ->paginate(7);     

    return view ("caja.docente.show",["estadosDocente"=>$estadosDocente,"docente"=>$docente]);

    }

   

}
