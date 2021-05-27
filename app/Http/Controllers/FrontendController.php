<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
    	$albums = Album::latest()->paginate(50);
    	return view('home', compact('albums'));
    }

    public function userAlbum($id)
    {
    	$albums = Album::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        $userBgPic= $user->bgpic;
        
        if(Auth::check()){
            $userId = $id;
            $follows = (new User)->amIfollowing($userId);
            return view('user-album', compact('albums', 'userId', 'follows', 'userBgPic'));
        }

        return view('user-album', compact('albums', 'userBgPic'));
    }
}
