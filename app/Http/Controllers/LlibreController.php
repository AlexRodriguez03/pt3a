<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Llibre;
use App\Models\Autor;

class LlibreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list() 
    { 
      $llibres = Llibre::all();

      return view('llibre.list', ['llibres' => $llibres]);
    }

    function new(Request $request) 
    { 
      if ($request->isMethod('post')) {    
        // recollim els camps del formulari en un objecte llibre

        $llibre = new Llibre;
        $llibre->titol = $request->titol;
        $llibre->dataP = $request->dataP;
        $llibre->vendes = $request->vendes;
        $llibre->autor_id = $request->autor_id;
        $llibre->save();

        $cookie = cookie('autor', $llibre->autor_id, 9999999);

        if ($llibre->autor_id  == null) {
          return redirect()->route('llibre_list')->with('status', 'Nou llibre '.$llibre->titol.' creat!')->withoutCookie('autor');
        }

        return redirect()->route('llibre_list')->with('status', 'Nou llibre '.$llibre->titol.' creat!')->cookie($cookie);
      }
      // si no venim de fer submit al formulari, hem de mostrar el formulari

      $autors = Autor::all();

      $cookie = $request->cookie('autor');

      return view('llibre.new', ['autors' => $autors, 'cookie' => $cookie]);
    }

    function delete($id) 
    { 
      $llibre = Llibre::find($id);
      $llibre->delete();

      return redirect()->route('llibre_list')->with('status', 'Llibre '.$llibre->titol.' eliminat!');
    }

    function edit(Request $request, $id)
    {
      $llibre = Llibre::find($id);

      if ($request->isMethod('post')) {    
        $llibre->titol = $request->titol;
        $llibre->dataP = $request->dataP;
        $llibre->vendes = $request->vendes;
        $llibre->autor_id = $request->autor_id;
        $llibre->save();

        return redirect()->route('llibre_list')->with('status', 'Llibre '.$llibre->titol.' editat!');
      }

      $autors = Autor::all();

      return view('llibre.edit', ['autors' => $autors, 'llibre' => $llibre]);
    }

    function autor($id)
    {
      $llibre = Llibre::find($id);

      return $llibre->belongsTo(Autor::class);
    }
}