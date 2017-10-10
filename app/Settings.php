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
// eval(\Psy\sh());
// dd($fullSettings);
		if (is_array($fullSettings['privacy']['public'])) {
			// dd($fullSettings['privacy']);
			$fullSettings['privacy']['public'] = array_pop($fullSettings['privacy']['public']);
		}

		$this->user->settings = $fullSettings;
		return $this->user->save();
	}
}