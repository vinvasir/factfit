<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
			parent::setUp();
			$this->signIn();
	}

	/** @test */
	function it_can_check_if_there_was_any_activity_today()
	{
			// dd(auth()->user()->days);

			// given we have a user without any activity for this day
			$this->assertEmpty(auth()->user()->days);

			// and the user checks their activity for today
			auth()->user()->checkActivityFor(\Carbon\Carbon::now());

			// the user should have a notification for this day
			$this->assertCount(1, auth()->user()->notifications);

	}

	/** @test */
	function it_does_not_create_inactive_notifications_if_a_user_was_active()
	{
			// auth()->user()->addDay(\Carbon\Carbon::now());
	}
}