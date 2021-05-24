<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
		return view('album.create');
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:3|max:200',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $imageName = $request->image->hashName(); //hashName() slicno kao da koristimo store/storage
        $request->image->move(public_path('album'), $imageName);
      
        $album = Album::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
            'user_id' => auth()->user()->id,
            'image' => $imageName
      ]);

       $id = $album->id;
       return response()->json([ 'id' => $id ]);
    }
}
