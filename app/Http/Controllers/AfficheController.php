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
        return view('admin.nourriture.affiche.liste')->with('affiches', $affiches);
    }

    public function create()
    {
        return view('admin.nourriture.affiche.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
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
