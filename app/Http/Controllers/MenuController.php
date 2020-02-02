<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::orderBy('id')->get();
        return view('admin.nourriture.menu.liste')->with('menus', $menus);
    }

    public function create()
    {
        return view('admin.nourriture.menu.create');
    }


    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->nom = $request->input('nom');
        $menu->dateMenu = $request->input('dateMenu');

        $menu->save();
        
        return redirect('home');
    }

    
    
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->plats()->detach();
        $menu->delete();

        return redirect('home');
        
    }
    

}
