<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;
use sisPazySalvos\PeriodoAcademico;

use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\PeriodoFormRequest;
use DB;

class PeriodoController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
  
      }

    public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   if($request){
   
    $periodos=DB::table('periodo_academico')
    ->orderBy('id_periodoac','asc')
    ->paginate(7); 
    return view('sispazysalvos.periodo.index',["periodos"=>$periodos]);
   }


    }

    public function create(){
      
       return view ('sispazysalvos.periodo.create');
    }

    public function store(PeriodoFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
     
        $periodo = new PeriodoAcademico;
        $periodo->ano=$request->get('ano');
        $periodo->periodo=$request->get('periodo');
        
        $periodo->save();
        
        
        return Redirect::to('sispazysalvos/periodo');
    }

    public function show($id){ 
    return view ("sispazysalvos.periodo.show",["periodo"=>PeriodoAcademico::findOrFail($id)]);


    }
    public function edit($id){
        return view ("sispazysalvos.periodo.edit",["periodo"=>PeriodoAcademico::findOrFail($id)]);

    }
    public function update(PeriodoFormRequest $request , $id){
        
        $periodo=PeriodoAcademico::findOrFail($id); //Acá lo que se hace es obtener el docente por el id ingresado.
        $periodo->ano=$request->get('ano');
        $periodo->periodo=$request->get('periodo');
    
        $periodo->update();

        return Redirect::to('sispazysalvos/periodo');   
        
    }

    public function destroy($id){
        PeriodoAcademico::destroy($id);  
        return Redirect::to('sispazysalvos/periodo');                                   
    }
}
