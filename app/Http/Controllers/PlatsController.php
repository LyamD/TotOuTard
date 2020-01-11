<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plats;

class PlatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plats = Plats::all();
        return view('')->with('plats', $plats);
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $plats = new Plats;
        $plats->nom = $request->input('nom');
        $plats->commentaire = $request->input('commentaire');
        $plats->prix = $request->input('prix');
        $plats->contient_porc = $request->input('contient_porc');
        $plats->present_carte = $request->input('present_carte');

        $plats->save();
        

        return redirect('home');
    }

    public function show($id)
    {
        $plats = plats::find($id);
        return view('')->with('plats', $plats);
    }

    static public function edit($id)
    {
        $plats = plats::find($id);
        return view('', );
    }

    public function update(Request $request, $id)
    {
        $plats = Plats::find($id);
        $plats->nom = $request->input('nom');
        $plats->commentaire = $request->input('commentaire');
        $plats->prix = $request->input('prix');
        $plats->contient_porc = $request->input('contient_porc');
        $plats->present_carte = $request->input('present_carte');

        $plats->save();

        return redirect('home');
    }

    static public function destroy($id)
    {
        $plats = Plats::find($id);
        $plats->delete();

        return redirect('home');
    }

}
