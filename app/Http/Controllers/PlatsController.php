<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plat;
use App\Menu;

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
        $plat = Plat::find($id);
        $plat->affiche()->destroy();
        $menus = $plat->menus()->detach();
        $plat->affiche()->destroy();
        $plat->destroy();

        return redirect('home');
    }

    // Custom


    public function addToMenu(Request $request) {
        $data = array('plats' => $request->checkedPlats, 'action' => $request->action);
        $action = $data['action'];
        if ($action == 'delete') {
            $this->deleteMultiplePlats($data);
        } elseif ($action == 'detach') {
            $this->detachFromMenus($data);
        } else {
            $this->linkToMenu($data);
        }
        return redirect('home');
        //return view('test')->with('data', $data);
    }
    function deleteMultiplePlats($data) {
        $ids = $data['plats'];
        foreach ($ids as $id) {
            var_dump($id);
            $plat = Plat::find($id);
            $plat->affiche()->destroy();
            $plat->menus()->detach();
            $plat->destroy();
        }
    }

    function linkToMenu($data) {
        $menu = Menu::find($data['action']);
        $ids = $data['plats'];
        $menu->plats()->attach($ids);
    }

    function detachFromMenus($data) {
        $ids = $data['plats'];
        foreach ($ids as $id) {
            $plat = Plat::find($id);
            $plat->menus()->detach();
        }
    }

}
