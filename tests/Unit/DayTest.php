<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTest extends TestCase
{
	use DatabaseMigrations;

  protected $day;

	public function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->day = create('App\Day', ['user_id' => auth()->id(), 'date' => '2017-01-23']);
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

			$newDateDay = create('App\Day', ['date' => '2017-04-11']);

			auth()->user()->addDay($sameDateDay->date);

			auth()->user()->addDay($newDateDay->date);

			$this->assertContains($this->day->id, auth()->user()->days()->pluck('id'));

			$this->assertContains($newDateDay->id, auth()->user()->days()->pluck('id'));

			$this->assertNotContains($sameDateDay->id, auth()->user()->days()->pluck('id'));
    }

    /** @test */
    function it_has_foods()
    {
        create('App\Food', ['day_id' => $this->day->id], 4);

        $this->assertEquals($this->day->foods->count(), 4);
    }

    /** @test */
    function it_requires_at_least_10_foods_and_80_percent_must_be_good()
    {
    		create('App\Food', ['day_id' => $this->day->id, 
    												'user_id' => auth()->id(),
    												'type' => 4]);

    		create('App\Food', ['day_id' => $this->day->id, 
    												'user_id' => auth()->id(),
    												'type' => 8]);

    		create('App\Food', ['day_id' => $this->day->id, 
    												'user_id' => auth()->id(),
    												'type' => 9]);

    		create('App\Food', ['day_id' => $this->day->id, 
    												'user_id' => auth()->id(),
    												'type' => 11]);

    		$food_goal_progress = ($this->day->fresh()->good_food_count - $this->day->fresh()->bad_food_count) / 10;

   			// dd($food_goal_progress . " " . $this->day->fresh()->food_goal_progress);

    		// formula is net good foods / 10 > 0.80
    		$this->assertEquals($this->day->fresh()->food_goal_progress, $food_goal_progress);																	    		
    }
}