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
}
