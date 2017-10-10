<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
		public function index()
		{
			$users = DB::table('users')->where('settings->privacy->public', true)->get();

			return view('profiles.index', compact('users'));
		}

    public function show(User $user)
    {
    	return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
    	return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
    	$user->update(request('all'));

    	return back();
    }
}
