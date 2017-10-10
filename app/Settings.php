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

		if ($this->user->settings) {
			$fullSettings = array_merge_recursive($this->user->settings, $sanitizedSettings);
		} else {
			$fullSettings = $sanitizedSettings;
		}
		
		$this->user->settings = $fullSettings;
		return $this->user->save();
	}
}