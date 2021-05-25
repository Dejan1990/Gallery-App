<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create($id)
    {
        $albumBelongsToUser = Album::where('user_id', auth()->user()->id)->where('id', $id)->exists();
        if($albumBelongsToUser){
            $album_id = $id;
            session()->put('id', $id);
            return view('image.create', compact('album_id'));
        }else{
            return back();
        }
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'files'=>'required',
            'files.*'=>'mimes:png,jpeg,jpg'
        ]);

        foreach($request->file('files') as $file){

    		$name = $file->hashName();
    		$file->move(public_path().'/images/',$name);

    		$file = new Image;
    		$file->album_id = $request->album_id;
    		$file->image = $name;
    		$file->save();
    	}
    	return response()->json(['success'=>'Your images successfully upload']);
	}
}
