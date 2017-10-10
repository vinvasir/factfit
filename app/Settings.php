<?php

namespace App;

class Settings {
	protected $user;

	protected $allowed = ['privacy', 'appTheme'];

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function merge(Array $attributes)
	{
		$sanitizedSettings = array_only($attributes, $this->allowed);

		$this->user->settings = array_merge($this->user->settings, $sanitizedSettings);
		return $this->user->save();
	}
}