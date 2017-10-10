<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUsersTest extends TestCase
{
  use DatabaseTransactions;

  /** @test */
  function an_authenticated_user_may_update_their_settings()
  {
  	$this->signIn();

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

  /** @test */
  function regular_users_may_not_update_other_users_settings()
  {
  	$this->signIn();

  	$otherUser = create('App\User');

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

  	$this->assertNotEqual($settings, $otherUser->fresh()->settings);  	
  }

  /** @test */
  function guests_may_not_update_other_users_settings()
  {
  	$otherUser = create('App\User');

  	$settings = ['privacy' => [
  			'public' => false,
  			'showWeightTo' => ['friends', 'followedUsers'],
  			'showFoodProgressTo' => ['followers']
  		],
  		'appTheme' => [
  			'backgroundColor' => 'dark'
  		]
  	];

  	$this->withExceptionHandling()
  			->post('/app/users/my-settings', $settings)
  			->assertRedirect('/login');

  	$this->assertNotEqual($settings, $otherUser->fresh()->settings);  	
  }  
}    