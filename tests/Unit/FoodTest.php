<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FoodTest extends TestCase
{
	use DatabaseMigrations;

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
			$this->food->update(['type' => 0]);

			$this->assertEquals($this->food->fresh()->typeName(), 'Leafy Greens');

			$this->food->update(['type' => 10]);

			$this->assertEquals($this->food->fresh()->typeName(), 'Refined Grains');
	}
}