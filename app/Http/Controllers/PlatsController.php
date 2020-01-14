<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plat;

class PlatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plats = Plat::all();
        return view('')->with('plat', $plats);
    }

    public function create()
    {
        return view('plat.create');
    }

    public function store(Request $request)
    {
        $plats = new Plat;
        $plats->nom = $request->input('nom');
        $plats->commentaire = $request->input('commentaire');
        $plats->prix = $request->input('prix');
        $plats->contient_porc = $request->input('contient_porc');
        $plats->present_carte = $request->input('present_carte');
        $plats->categories_plat_id = $request->input('categories_plat_id');

        $plats->save();
        

        return redirect('home');
    }

    public function show($id)
    {
        $plats = plat::find($id);
        return view('')->with('plat', $plats);
    }

    static public function edit($id)
    {
        $plat = plat::find($id);
        return view('plat.edit', compact('plat', 'id'));
    }

    

    public function update(Request $request, $id)
    {
        $plats = Plat::find($id);
        $plats->nom = $request->input('nom');
        $plats->commentaire = $request->input('commentaire');
        $plats->prix = $request->input('prix');
        $plats->contient_porc = $request->input('contient_porc');
        $plats->present_carte = $request->input('present_carte');
        $plats->categories_plat_id = $request->input('categories_plat_id');

        $plats->save();

        return redirect('home');
    }

    static public function destroy($id)
    {
        $plats = Plat::find($id);
        $plats->delete();

        return redirect('home');
    }

}
