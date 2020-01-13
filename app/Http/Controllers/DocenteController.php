<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;
use sisPazySalvos\Docente;
use sisPazySalvos\EstadoCaja;
use sisPazySalvos\Facultad;
use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\DocenteFormRequest;
use DB;



class DocenteController extends Controller
{
    public function __construct() {
      $this->middleware('admin');
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
    return view('sispazysalvos.docente.index',["docentes"=>$docentes,"searchText"=>$query]);
   }
 }

    public function create(){
       $facultades=DB::table('facultad')->get(); 
       return view ('sispazysalvos.docente.create',['facultades'=>$facultades]);
    }

    public function store(DocenteFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
      $facultades=$request['facultades'];
      foreach($facultades as $fac){
        
     $facultad=Facultad::find($fac);
     $docente= new Docente;
     $docente->nombre=$request->get('nombre');
     $docente->apellido=$request->get('apellido');
     $docente->documento=$request->get('documento');
     $docente->id_fac= $facultad->id_facultad;
     $docente->save();

       $estadoCaja= new EstadoCaja;
       $estadoCaja->id_doc=$docente->id_docente;
       $estadoCaja->documento_doc=$request->get('documento');
       $estadoCaja->estado='----';
       $estadoCaja->save();  }
         
        return Redirect::to('sispazysalvos/docente');
    }

    public function show($id){ 
    return view ("sispazysalvos.docente.show",["docente"=>Docente::findOrFail($id)]);
    }
    
    public function edit($documento){       
      $docentes=DB::table('docente')->where('documento','=', $documento)->get();

      foreach($docentes as $doc){
        $facultades[]=DB::table('facultad')->where('id_facultad', $doc->id_fac)->first();
      }
   
      $facs=DB::table('facultad')->get(); 

      foreach($facs as $fac){

          foreach($facultades as $f){
              
              if($fac->id_facultad != $f->id_facultad ){
                  $ingresa = 'si' ;
              }else{
                $ingresa = 'no';
                continue 2;  } //el continue me indica que continue en la iteracion externa.el primer foreach.
          }
          if($ingresa='si'){
            $facultades2[]=$fac;
         }
      }

      if(isset($facultades2)){
        return view ("sispazysalvos.docente.edit",["docente"=>DB::table('docente')->where('documento','=', $documento)->first(),"facultades"=>$facultades,"facultades2"=>$facultades2]);

      }else{
        return view ("sispazysalvos.docente.edit",["docente"=>DB::table('docente')->where('documento','=', $documento)->first(),"facultades"=>$facultades]);
      }


    }
    public function update(DocenteFormRequest $request,$documento){
      
        $docentes=DB::table('docente')->where('documento','=', $documento)->get(); //Acá lo que se hace es obtener el docente por el id ingresado.
        foreach($docentes as $doc){
          Docente::find($doc->id_docente)->delete();
        }

      $facultades=$request['facultades'];
    
      foreach($facultades as $fac){
       $facultad=Facultad::findOrFail($fac);
       $docente= new Docente;
       $docente->nombre=$request->get('nombre');
       $docente->apellido=$request->get('apellido');
       $docente->documento=$request->get('documento');
       $docente->id_fac= $facultad->id_facultad;
       $docente->save();
  
         $estadoCaja= new EstadoCaja;
         $estadoCaja->id_doc=$docente->id_docente;
         $estadoCaja->documento_doc=$request->get('documento');
         $estadoCaja->estado='----';
         $estadoCaja->save(); }
                     
       return Redirect::to('sispazysalvos/docente');   
        
    }
    
    public function destroy($id){
      Docente::find($id)->delete();
        return Redirect::to('sispazysalvos/docente');                                   

    }
}


