<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\EstadoDocente;
use sisPazySalvos\Docente;
use sisPazySalvos\Facultad;
use sisPazySalvos\Http\Requests\EstadoDocenteRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class DependenciaDocenteController extends Controller
{
    public function __construct() {
        $this->middleware('dependencia');
      }
  
      public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda

   }

   public function show($id){ 

    $docentes=DB::table('estado_docente as edoc')
    ->join('pazysalvo as pys','edoc.id_pazys','=','pys.id_pazysalvo' )
    ->join('docente as doce','edoc.id_doc','=','doce.id_docente')

    ->join('facultad as fac','pys.id_fac','=','fac.id_facultad')
    ->join('periodo_academico as per','pys.id_per','=','per.id_periodoac')
    
    ->where('edoc.id_pazys','=',$id)
    ->select('edoc.id_estado_doc as id_estadodoc','per.ano as ano','per.periodo as periodo','doce.nombre as nombre','doce.apellido as apellido','doce.documento as documento','fac.nombre as facultad','edoc.estado') 
  
    ->orderBy('edoc.id_estado_doc','desc')
    ->paginate(7);
      
    return view ("dependencia.docente.show",["docentes"=>$docentes]);

    }

    public function edit($id){
     $estadoDocente= EstadoDocente::find($id);
     $docente= Docente::find($estadoDocente->id_doc);
     $facultad=Facultad::find($docente->id_fac);

    return view ("dependencia.docente.edit",["estadodoc"=>$estadoDocente,"docente"=>$docente,"facultad"=>$facultad]);

    }

    public function update(EstadoDocenteRequest $request ,$id){
        
        $estadoDocente=EstadoDocente::findOrFail($id); //Acá lo que se hace es obtener el docente por el id ingresado.
        $estadoDocente->estado=$request->get('estado');
        $estadoDocente->observacion=$request->get('observacion');
    
        $estadoDocente->update();

        return redirect()->action('DependenciaDocenteController@show', [$estadoDocente->id_pazys]);
    }


  
}
