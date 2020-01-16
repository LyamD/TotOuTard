<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Plat;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function create()
    {
        return view('menu.create');
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
        $menu->destroy();
        
    }
    

}
