<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function followUnfollow(Request $request)
    {
        $followerId = User::find(auth()->user()->id);
    	$followingId = User::find($request->userId);
    	$followerId->following()->toggle($followingId);
    	return back();
	}
}
