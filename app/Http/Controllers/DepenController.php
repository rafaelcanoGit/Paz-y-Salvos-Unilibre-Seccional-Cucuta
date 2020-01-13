<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;

use sisPazySalvos\Dependencia;
use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\DependenciaFormRequest;
use DB;

class DepenController extends Controller
{
    public function __construct() {
        $this->middleware('admin');

      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   if($request){
    $query=trim($request->get('searchText'));
    $dependencias=DB::table('dependencia')
    ->orderBy('id_dependencia','asc')
    ->paginate(7); 
    return view('sispazysalvos.dependencia.index',["facultades"=>$dependencias,"searchText"=>$query]);
   }


    }

    public function create(){
      
       return view ('sispazysalvos.dependencia.create');
    }

    public function store(DependenciaFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
     
        $dependencia = new Dependencia;
        $dependencia->nombre=$request->get('nombre');
        
        $dependencia->save();
        
        
        return Redirect::to('sispazysalvos/dependencia');
    }

    public function show($id){ 
    return view ("sispazysalvos.dependencia.show",["facultad"=>Dependencia::findOrFail($id)]);


    }
    public function edit($id){
        return view ("sispazysalvos.dependencia.edit",["facultad"=>Dependencia::findOrFail($id)]);
    }
    public function update(DependenciaFormRequest $request , $id){
        
        $facultad=Dependencia::findOrFail($id); //Acá lo que se hace es obtener el docente por el id ingresado.
        $facultad->nombre=$request->get('nombre');
    
        $facultad->update();

        return Redirect::to('sispazysalvos/dependencia');   
        
    }

    public function destroy($id){
        Dependencia::destroy($id);  
        return Redirect::to('sispazysalvos/dependencia');                                   
    }


}

