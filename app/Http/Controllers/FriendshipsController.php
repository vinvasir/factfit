<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\Notifications\FriendRequest;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function store(User $user)
    {
        try {
            $friendship = Friendship::create(['friender_id' => auth()->id(), 'friended_id' => $user->id]);

            $n = new FriendRequest(auth()->user(), $user);

            $user->notify($n);

            return back();
        } catch (QueryException $e) {
            return abort(401, "You already friended that user!");
        }
    }

    public function accept(User $user)
    {
    	if (!in_array($user->id, auth()->user()->friendshipRequesters->pluck('id')->toArray())) {
    		return abort(401, "That user doesn't want to be your friend!");
    	}

    	Friendship::where(['friender_id' => $user->id, 'friended_id' => auth()->id()])
    		->get()[0]->update(['status' => 'approved']);

        return back();
    }
}
