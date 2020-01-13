<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;


class DependenciaPazySalvosController extends Controller
{
    public function __construct() {
        $this->middleware('dependencia');
      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   $user = Auth::user();

   if($request){
    $query=trim($request->get('searchText'));
    $pazysalvos=DB::table('pazysalvo as pys')->join('dependencia as dep','pys.id_dep','=','dep.id_dependencia')
    ->join('facultad as fac','pys.id_fac','=','fac.id_facultad')
    ->join('periodo_academico as per','pys.id_per','=','per.id_periodoac')
    ->where('dep.nombre','=',$user->rol)
    ->select('pys.id_pazysalvo','per.ano as ano' ,'per.periodo as periodo','fac.nombre as facultad','dep.nombre as dependencia')
    ->orderBy('pys.id_pazysalvo','desc')
    ->paginate(7); 
    return view('dependencia.pazysalvos.index',["pazysalvos"=>$pazysalvos,"searchText"=>$query]);
   }


    }

    public function show($id){ 
      
      return view ("dependencia.pazysalvos.show",["docentes"=>$docentes]);
      }
}
