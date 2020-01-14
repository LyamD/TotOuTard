<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affiche;

class AfficheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $affiches = Affiche::all();
        return view('')->with('affiche', $affiches);
    }

    public function create()
    {
        return view('affiche.create');
    }

    public function store(Request $request)
    {
        $affiches = new Affiche;
        $affiches->nom = $request->input('nom');
        $affiches->description = $request->input('description');
        $affiches->plats_id = $request->input('plats_id');

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
