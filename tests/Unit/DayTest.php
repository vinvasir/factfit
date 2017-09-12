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

			$food_progress = ($this->day->good_food_count - $this->day->bad_food_count) / 10;

			$this->day->setProgress();
			
			$this->assertEquals($food_progress, $this->day->food_goal_progress);
    }

    /** @test */
    function a_user_can_only_have_one_day_record_per_real_world_date()
    {
			$this->assertEquals(auth()->id(), $this->day->user_id);

			$sameDate = $this->day->date;

			$newDate = \Carbon\Carbon::now()->addDay()->toDateString();

			auth()->user()->addDay($sameDate);

			auth()->user()->addDay($newDate);

            $user_day_ids = auth()->user()->fresh()->days()->pluck('id')->all();

            $user_day_dates = auth()->user()->fresh()->days()->pluck('date')->all();

			$this->assertContains($this->day->id, $user_day_ids);
// eval(\Psy\sh());
			$this->assertContains($newDate, $user_day_dates);

            $this->assertCount(2,  auth()->user()->fresh()->days);

			$this->assertEquals(1, auth()->user()->fresh()->days()->where('date', $this->day->date)->count());
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