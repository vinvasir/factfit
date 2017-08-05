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

				$food_progress = $this->day->good_food_count / ($this->day->good_food_count + $this->day->bad_food_count);

    		$this->day->setProgress();
    		
    		$this->assertEquals($this->day->food_goal_progress, $food_progress);
    }
}