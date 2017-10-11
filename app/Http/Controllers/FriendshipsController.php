<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\User;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function store(User $user)
    {
    	$friendship = Friendship::create(['friender_id' => auth()->id(), 'friended_id' => $user->id]);
    }

    public function accept(User $user)
    {
    	if (!in_array($user->id, auth()->user()->friendshipRequesters->pluck('id')->toArray())) {
    		return abort(401, "That user doesn't want to be your friend!");
    	}
// eval(\Psy\sh());
    	Friendship::where(['friender_id' => $user->id, 'friended_id' => auth()->id()])
    		->firstOrFail()->update(['status' => 'approved']);
    }
}
