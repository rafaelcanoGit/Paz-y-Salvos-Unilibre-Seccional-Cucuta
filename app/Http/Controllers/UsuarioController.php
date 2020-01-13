<?php

namespace sisPazySalvos\Http\Controllers;

use Illuminate\Http\Request;
use sisPazySalvos\Http\Requests;
use sisPazySalvos\User;
use Illuminate\Support\Facades\Redirect;
use sisPazySalvos\Http\Requests\UsuarioFormRequest;
use DB;


class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
      }
  
      public function index(Request $request){ //se busca según el texto ingresado, se retorna la vista con condiciones de búsqueda
  
     if($request){
      $query=trim($request->get('searchText'));
      $usuarios=DB::table('usuarios')
      ->where('nombre','LIKE','%'.$query.'%')
      ->orwhere('email','LIKE','%'.$query.'%')
      ->orderBy('id_usuario','asc')
      ->paginate(7);

      return view('sispazysalvos.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
     }
  
  
      }
  
      public function create(){
         $dependencias=DB::table('dependencia')->get();
         return view ('sispazysalvos.usuario.create',["dependencias"=>$dependencias]);
      }

  
      public function store(UsuarioFormRequest $request){ //almacenar el objeto del modelo en nuestra tabla en la database.
       
          $usuario = new User;
          $usuario->nombre=$request->get('nombre');
          $usuario->email=$request->get('email');
          $usuario->password=bcrypt($request->get('password'));
          $usuario->estado="Activo";
          $usuario->rol=$request->get('rol');
          $usuario->save();
          
          
          return Redirect::to('sispazysalvos/usuario');
      }
  
      public function show($id){ 
      return view ("sispazysalvos.usuario.show",["docente"=>User::findOrFail($id)]);
      }
      
      public function edit($id){       
          $dependencias=DB::table('dependencia')->get();
          return view ("sispazysalvos.usuario.edit",["usuario"=>User::findOrFail($id),"dependencias"=>$dependencias]);
  
      }
      public function update(UsuarioFormRequest $request,$id){
          
          $usuario=User::findOrFail($id); //Acá lo que se hace es obtener el docente por el id ingresado.
          $usuario->nombre=$request->get('nombre');
          $usuario->email=$request->get('email');
          $usuario->password=bcrypt($request->get('password'));
          $usuario->estado=$request->get('estado');
          $usuario->rol=$request->get('rol');
          $usuario->update();        
            
          return Redirect::to('sispazysalvos/usuario');   
          
      }
      
      public function destroy($id){
          
        User::find($id)->delete();
  
          return Redirect::to('sispazysalvos/usuario');                                   
  
      }
}
