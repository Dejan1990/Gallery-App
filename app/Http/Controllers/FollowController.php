<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
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

	public function profile()
	{
		$followings = Follower::where('follower_id', auth()->user()->id)->get();
		foreach($followings as $following){
			$userId = $following->userfollow->id;
			$follows = (new User)->amIFollowing($userId);
		}

		return view('profile', compact('userId', 'follows', 'followings'));
	}
}
