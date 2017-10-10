<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUsersTest extends TestCase
{
  use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
		$this->signIn();
	}


  /** @test */
  function an_authenticated_user_may_update_their_settings()
  {
  	$settings = ['privacy' => [
  			'public' => false,
  			'showWeightTo' => ['friends', 'followedUsers'],
  			'showFoodProgressTo' => ['followers']
  		],
  		'appTheme' => [
  			'backgroundColor' => 'dark'
  		]
  	];

  	$this->post('/app/users/my-settings', $settings);

  	$this->assertEqual($settings, auth()->user()->fresh()->settings);
  }
}    