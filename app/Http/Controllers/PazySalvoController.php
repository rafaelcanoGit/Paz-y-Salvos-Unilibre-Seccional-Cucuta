<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;
use sisPazySalvos\PazySalvo;
use sisPazySalvos\EstadoDocente;
use sisPazySalvos\EstadoCaja;
use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\PazySalvoFormRequest;
use DB;

class PazySalvoController extends Controller
{

    public function __construct() {
        $this->middleware('talento');
      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   if($request){
    $query=trim($request->get('searchText'));
    $pazysalvos=DB::table('pazysalvo as pys')->join('dependencia as dep','pys.id_dep','=','dep.id_dependencia')
    ->join('facultad as fac','pys.id_fac','=','fac.id_facultad')
    ->join('periodo_academico as per','pys.id_per','=','per.id_periodoac')
    ->select('pys.id_pazysalvo','per.ano as ano' ,'per.periodo as periodo','fac.nombre as facultad','dep.nombre as dependencia')
    ->orderBy('pys.id_pazysalvo','desc')
    ->paginate(7); 
    return view('talentohumano.pazysalvos.index',["pazysalvos"=>$pazysalvos,"searchText"=>$query]);
   }


    }

    public function create(){
        $periodos=DB::table('periodo_academico')->get();
        $facultades=DB::table('facultad')->get();
        $dependencias=DB::table('dependencia')->get();

       return view ('talentohumano.pazysalvos.create',["periodos"=>$periodos,"facultades"=>$facultades,"dependencias"=>$dependencias]);
    }

    public function store(PazySalvoFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
     
        $dependencias = $request['dependencias'];

        foreach($dependencias as $dep){
            $pazysalvo= new PazySalvo;
            $pazysalvo->id_dep=$dep;
            $pazysalvo->id_fac=$request->get('facultad');
            $pazysalvo->id_per=$request->get('periodo');
            $pazysalvo->save();

            $docentes=DB::table('docente')->where('id_fac','=',$pazysalvo->id_fac)->get();
            foreach($docentes as $doc){

             $estadoDocente = new EstadoDocente;
             $estadoDocente->id_pazys=$pazysalvo->id_pazysalvo;
             $estadoDocente->id_doc=$doc->id_docente;
             $estadoDocente->estado='Por Confirmar';
             $estadoDocente->save();

                                       }   
        }
        
        return Redirect::to('talentohumano/pazysalvos');
    }

    public function show($id){ 
    return view ("talentohumano.pazysalvos.show",["pazysalvos"=>PazySalvo::findOrFail($id)]);
    }

    public function destroy($id){
        Pazysalvo::destroy($id);  
        return Redirect::to('talentohumano/pazysalvos');                                   
    }





}
