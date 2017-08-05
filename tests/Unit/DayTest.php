<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
		use DatabaseMigrations;

	  protected $day;

		public function setUp()
		{
			parent::setUp();
			$this->day = factory('App\Day')->create();
		}

    /** @test */
    function a_day_can_set_food_goal_progress()
    {
    		$this->assertInstanceOf('App\Day', $this->day);
    		dd($this->day);
    }
}