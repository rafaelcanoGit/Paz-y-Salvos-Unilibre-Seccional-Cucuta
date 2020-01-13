<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;

use sisPazySalvos\Facultad;
use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\FacultadFormRequest;
use DB;

class FacultadController extends Controller
{
    public function __construct() {
        $this->middleware('admin');

      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   if($request){
    $query=trim($request->get('searchText'));
    $facultades=DB::table('facultad')
    ->orderBy('id_facultad','asc')
    ->paginate(7); 
    return view('sispazysalvos.facultad.index',["facultades"=>$facultades,"searchText"=>$query]);
   }


    }

    public function create(){
      
       return view ('sispazysalvos.facultad.create');
    }

    public function store(FacultadFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
     
        $facultad = new Facultad;
        $facultad->nombre=$request->get('nombre');
        
        $facultad->save();
        
        
        return Redirect::to('sispazysalvos/facultad');
    }

    public function show($id){ 
    return view ("sispazysalvos.facultad.show",["facultad"=>Facultad::findOrFail($id)]);


    }
    public function edit($id){
        return view ("sispazysalvos.facultad.edit",["facultad"=>Facultad::findOrFail($id)]);

    }
    public function update(FacultadFormRequest $request , $id){
        
        $facultad=Facultad::findOrFail($id); //Acá lo que se hace es obtener el docente por el id ingresado.
        $facultad->nombre=$request->get('nombre');
    
        $facultad->update();

        return Redirect::to('sispazysalvos/facultad');   
        
    }

    public function destroy($id){
        Facultad::destroy($id);  
        return Redirect::to('sispazysalvos/facultad');                                   
    }


}
