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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store(
            'platsAffiche', 'image_upload'
        );

        $affiche = new Affiche;
        $affiche->nom = $request->input('nom');
        $affiche->description = $request->input('description');
        $affiche->plats_id = $request->input('plats_id');
        $affiche->imageName = $path;

        $affiche->save();

        return redirect('home');
    }

    static public function destroy($id)
    {
        $affiches = Affiche::find($id);
        $affiches->delete();

        return redirect('home');
    }
}
