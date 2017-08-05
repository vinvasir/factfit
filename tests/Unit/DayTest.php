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
			$this->signIn();
			$this->day = create('App\Day', ['user_id' => auth()->id()]);
		}

    /** @test */
    function a_day_can_set_food_goal_progress()
    {
    		$this->assertInstanceOf('App\Day', $this->day);

				$food_progress = $this->day->good_food_count / ($this->day->good_food_count + $this->day->bad_food_count);

    		$this->day->setProgress();
    		
    		$this->assertEquals($this->day->food_goal_progress, $food_progress);
    }

    /** @test */
    function a_user_can_only_have_one_day_record_per_real_world_date()
    {
    		$this->assertEquals(auth()->id(), $this->day->user_id);

    		$sameDateDay = create('App\Day', ['date' => $this->day->date]);

    		auth()->user()->addDay($sameDateDay);

    		$this->assertContains($this->day, auth()->user()->days());

    		!$this->assertContains($sameDateDay, auth()->user()->days());
    }
}