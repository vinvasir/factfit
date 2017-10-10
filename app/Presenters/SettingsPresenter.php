<?php

namespace App\Presenters;

use App\User;

class SettingsPresenter {
	protected $settings;

	public function __construct(Array $settings) {
		$this->settings = $settings;
	}

	public function isPublic()
	{
		if (array_key_exists('public', $this->privacySettings())) {
			return $this->privacySettings()['public'];
		} else {
			return false;
		}
	}

	public function showWeightTo()
	{
		if (array_key_exists('showWeightTo', $this->privacySettings())) {
			return $this->privacySettings()['showWeightTo'];
		} else {
			return ['friends'];
		}
	}

	public function showFoodProgressTo()
	{
		if (array_key_exists('showFoodProgressTo', $this->privacySettings())) {
			return $this->privacySettings()['showFoodProgressTo'];
		} else {
			return ['friends'];
		}		
	}

	protected function privacySettings()
	{
		if (array_key_exists('privacy', $this->settings)) {
			return ($this->settings['privacy']);
		} else {
			return ['public' => false, 'showWeightTo' => ['friends'], 'showFoodProgressTo' => ['friends']];
		}
	}

	protected function themeSettings()
	{
		if (array_key_exists('appTheme', $this->settings)) {
			return $this->settings['appTheme'];
		} else {
			return ['backgroundColor' => 'dark'];
		}
	}
}