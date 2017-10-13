<?php

namespace App\Http\Controllers;

use App\Day;
use App\Presenters\SettingsPresenter;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	public function index(Request $request)
	{
        if ($request->query('friends') === '1') {
            $users = auth()->user()->friends();
        } else {
            $users = User::where('settings->privacy->public', true)->get();
        }

		return view('profiles.index', compact('users'));
	}

    public function show(User $user)
    {
        if ($user->settings['privacy']['public'] != true) {
            return redirect()->route('profile', auth()->id());
        }

        $weightByDay = Day::whereNotNull('weight')
            ->selectRaw('DATE_FORMAT(date, "%d %M") as day, weight')
            ->pluck('weight', 'day');

    	return view('profiles.show', compact('user', 'weightByDay'));
    }

    public function edit(User $user)
    {
        if ($user->id !== auth()->id()) {
            return redirect()->route('profile', auth()->id());
        }

        $selectedSettings = new SettingsPresenter($user->settings);

    	return view('profiles.edit', compact('user', 'selectedSettings'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->id !== auth()->id()) {
            return abort(401, "You are not authorized to edit that profile!");
        }

        $serializableSettings = request('settings');
        if ($serializableSettings['privacy']['public'] === 'true') {
            $serializableSettings['privacy']['public'] = true;
        } else {
            $serializableSettings['privacy']['public'] = false;
        }

    	$user->settingsManager()->merge($serializableSettings);

    	return back();
    }

    public function notifications(User $user)
    {
        if ($user->id !== auth()->id()) {
            return abort(401, "Stop trying to view other users' notifications!");
        }

        return auth()->user()->unreadNotifications;
    }

    public function destroyNotification(User $user, $notificationId)
    {
        auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
    }
}
