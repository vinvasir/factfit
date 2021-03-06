<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FoodTest extends TestCase
{
	use DatabaseTransactions;

  protected $food;

	public function setUp()
	{
			parent::setUp();
			$this->signIn();
			$this->food = create('App\Food', ['user_id' => auth()->id()]);
	}

	/** @test */
	function it_selects_between_a_closed_set_of_food_types()
	{
			$this->food->update(['type_name' => '\App\FoodTypes\LeafyGreen']);

			$this->assertEquals($this->food->fresh()->typeName(), 'Leafy Green');

			$this->food->update(['type' => 10]);

			$this->assertEquals($this->food->fresh()->typeName(), 'Refined Grains');
	}

	/** @test */
	function it_can_display_the_food_type_even_when_the_value_is_zero()
	{	
			$this->food->update(['type' => 0, 'type_name' => null]);

			// dd($this->food);

			$this->assertEquals('Leafy Green', $this->food->fresh()->typeName());
	}

	/** @test */
	function it_offers_a_closed_selection_of_meals()
	{
			$this->food->update(['meal' => 0]);

			$this->assertEquals($this->food->fresh()->mealName(), 'Breakfast');

			$this->food->update(['meal' => 1]);

			$this->assertEquals($this->food->fresh()->mealName(), 'Lunch');

			$this->food->update(['meal' => 2]);

			$this->assertEquals($this->food->fresh()->mealName(), 'Dinner');

			$this->food->update(['meal' => 3]);

			$this->assertEquals($this->food->fresh()->mealName(), 'Snack');							
	}

	/** @test */
	function it_increments_its_days_good_food_bad_food_counts()
	{
			$day = create('App\Day');
// dd($day);
			$initial_good_foods = $day->good_food_count;

			$initial_bad_foods = $day->bad_food_count;

			create('App\Food', ['type_name' => '\App\FoodTypes\LeafyGreen', 'day_id' => $day->id, 'user_id' => auth()->id()]);

			$good_food_count = $initial_good_foods + 1;
// dd($day->foods);
			// dd($day->fresh()->good_found_count);
// eval(\Psy\sh());
			$this->assertEquals($day->fresh()->good_food_count, $good_food_count);

			create('App\Food',  ['type_name' => '\App\FoodTypes\IceCream', 'day_id' => $day->id, 'user_id' => auth()->id()]);

			$bad_food_count = $initial_bad_foods + 1;

			$this->assertEquals($day->fresh()->bad_food_count, $bad_food_count);
	}
}