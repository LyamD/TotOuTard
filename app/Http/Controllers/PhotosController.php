<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{

    public function index()
    {
        $photos = Photos::all();
        return view('admin.photosEv')->with('photos', $photos);
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store(
            'Evenement', 'image_upload'
        );

        $photo = new Photos;
        $photo->description = $request->input('description');
        $photo->image = $path;

        $photo->save();

        return redirect('home');
    }


   
    public function update(Request $request, $id)
    {
        $photo = Photos::find($id);
        
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        Storage::disk('image_upload')->delete($photo['image']);
        $path = $request->file('image')->store(
            'Evenement', 'image_upload'
        );
        $photo->image = $path;

        $photo->save();

        return redirect('home');
    }

    
    public function destroy(Photos $photos)
    {
        $photo = Photos::find($id);
        Storage::disk('image_upload')->delete($photo['image']);
        $photo->delete();

        return redirect('home');
    }
}
