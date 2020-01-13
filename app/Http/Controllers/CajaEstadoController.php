<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\EstadoCaja;
use sisPazySalvos\Docente;
use sisPazySalvos\Facultad;
use sisPazySalvos\Http\Requests\EstadoCajaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class CajaEstadoController extends Controller
{
    
    public function __construct() {
        $this->middleware('caja');
      }
  
      public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   }

   public function show($id){ 
    $docente=Docente::findOrFail($id);
    $estadocaja=DB::table('estadocaja')->where('documento_doc', $docente->documento)->first();
    $facultades=DB::table('facultad')->where('id_facultad', $docente->id_fac)->get();
   
    return view ("caja.estado.show",["docente"=>$docente,"facultades"=>$facultades,"estadocaja"=>$estadocaja]);
    }


 //   public function store(EstadoCajaFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
 //       $estadoCaja = new EstadoCaja;
 //       $estadoCaja->documento_doc=$request->get('documento');
 //       $estadoCaja->estado=$request->get('estado');
//      $estadoCaja->observacion=$request->get('observacion');
 //       $estadoCaja->save();
 //       return Redirect::to('caja/docents');
 //   }


 //   public function edit($id){
 //    $estadoCaja= EstadoCaja::find($id);
 //    $docente=DB::table('docente')->where('documento', $documento)->first();
 //    $facultad=Facultad::find($docente->id_fac);
 //   return view ("caja.estado.edit",["estadodoc"=>$estadoCaja,"docente"=>$docente,"facultad"=>$facultad]);
 //   }

    public function update(EstadoCajaFormRequest $request, $id){
        $estadoCaja=DB::table('estadocaja')->where('id_estadocaja', $id)->first();
        $estados =DB::table('estadocaja')->where('documento_doc', $estadoCaja->documento_doc)->get();

        foreach($estados as $ec){
            $ecaja=EstadoCaja::find($ec->id_estadocaja);
            $ecaja->estado=$request->get('estado');
            $ecaja->observacion=$request->get('observacion');
            $ecaja->update();
        }
        
        return Redirect::to('caja/docents');
    }


}
