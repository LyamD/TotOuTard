<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfficheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $affiches = Affiche::all();
        return view('')->with('affiches', $affiches);
    }

    public function create()
    {
        return view('affiches.create');
    }

    public function store(Request $request)
    {
        $affiches = new Affiche;
        $affiches->nom = $request->input('nom');
        $affiches->commentaire = $request->input('description');

        $affiches->save();

        return redirect('home');
    }

    public function show($id)
    {
        $affiches = Affiche::find($id);
        return view('')->with('affiches', $affiches);
    }

    static public function edit($id)
    {
        $affiche = Affiche::find($id);
        return view('affiches.edit', compact('affiche', 'id'));
    }

    public function update(Request $request, $id)
    {
        $affiches = Affiche::find($id);
        $affiches->nom = $request->input('nom');
        $affiches->commentaire = $request->input('description');

        $affiches->save();

        return redirect('home');
    }

    static public function destroy($id)
    {
        $affiches = Affiche::find($id);
        $affiches->delete();

        return redirect('home');
    }
}
