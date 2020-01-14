<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boisson;

class BoissonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $boissons = boisson::all();
        return view('')->with('boisson', $boissons);
    }

    public function create()
    {
        return view('boisson.create');
    }

    public function store(Request $request)
    {
        $boissons = new boisson;
        $boissons->nom = $request->input('nom');
        $boissons->description = $request->input('description');
        $boissons->prix = $request->input('prix');
        $boissons->contenance = $request->input('contenance');
        $boissons->present_carte = $request->input('present_carte');
        $boissons->contient_alcool = $request->input('contient_alcool');

        $boissons->save();
        
        return redirect('home');
    }

    static public function edit($id)
    {
        $boisson = boisson::find($id);
        return view('boisson.edit', compact('boisson', 'id'));
    }

    public function update(Request $request, $id)
    {
        $boissons = boisson::find($id);
        $boissons->nom = $request->input('nom');
        $boissons->description = $request->input('description');
        $boissons->prix = $request->input('prix');
        $boissons->contenance = $request->input('contenance');
        $boissons->present_carte = $request->input('present_carte');
        $boissons->contient_alcool = $request->input('contient_alcool');

        $boissons->save();

        return redirect('home');
    }

    static public function destroy($id)
    {
        $boissons = boisson::find($id);
        $boissons->delete();

        return redirect('home');
    }
}
