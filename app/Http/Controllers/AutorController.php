<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Llibre;
use App\Models\Autor;




class AutorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list() 
    { 
      $autors = Autor::all();

      return view('autor.list', ['autors' => $autors]);
    }

    function new(Request $request) 
    { 
      if ($request->isMethod('post')) {    
        // recollim els camps del formulari en un objecte llibre

        $autor = new Autor;
        $autor->nom = $request->nom;
        $autor->cognoms = $request->cognoms;
        $autor->id= $request->id;
     
        $autor->save();

        return redirect()->route('autor_list')->with('status', 'Nou Autor '.$autor->nom.' creat!');
      }
      // si no venim de fer submit al formulari, hem de mostrar el formulari

      $autors = Autor::all();

      return view('autor.new', ['autors' => $autors]);
    }

    function delete($id) 
    { 
      $autor = Autor::find($id);
      $autor->delete();

      return redirect()->route('autor_list')->with('status', 'Autor '.$autor->nom.' eliminat!');
    }

    function edit($id, Request $request){
      $autor = Autor::find($id);
      if ($request->isMethod('post')) {    
        // recollim els camps del formulari en un objecte llibre
       
        $autor->nom = $request->nom;
        $autor->cognoms = $request->cognoms;
        if ($request->file('imatge')) {
          $file = $request->file('imatge');
          $filename = $request->nom . '_' . $request->cognoms . '.' . $file->getClientOriginalExtension();
          $file->move(public_path(env('RUTA_IMATGES', false)), $filename);
          $autor->imatge = $filename;
      }
      if ($request->file('imatge')) {
        $file = $request->file('imatge');
        $filename = $request->nom . '_' . $request->cognoms . '.' . $file->getClientOriginalExtension();
        $autor->imatge = $filename;                
    }
    if (isset($request->deleteImage)) {                
        Storage::delete(env('RUTA_IMATGES', false) . $autor->imatge);
        $autor->imatge = null;
    }
        $autor->id= $request->id;
     
        $autor->save();

        return redirect()->route('autor_list')->with('status', 'Autor '.$autor->nom.' editat!');
      }

      return view('autor.edit', ['autor' => $autor]);
    }
    
}


