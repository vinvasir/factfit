<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageDaysTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_days()
    {
 		$day = create('App\Day');
		$this->withExceptionHandling()
                 ->post('/app/days', $day->toArray())
                 ->assertRedirect('/login');   		
    }
    /** @test */
    function guests_cannot_see_the_create_day_page()
    {
        $this->withExceptionHandling()
             ->get('/app/days/create')
             ->assertRedirect('/login');
    }

    /** @test */
    function authenticated_users_can_see_the_create_day_page()
    {
        $this->signIn()
             ->get('/app/days/create')
             ->assertSee('Create an Entry for this Day');
    }

    /** @test */
    function an_authenticated_user_can_create_new_days()
    {
		// Given we have an authenticated user
		$this->signIn();
		// When we hit the endpoint to create a new day
		$day = make('App\Day');

		$response = $this->post('/app/days', $day->toArray());
		// Then when we visit the day page
		$this->assertDataBaseHas('days', ['user_id' => auth()->id(), 'date' => $day->date])
              ->get($response->headers->get('Location'))
		      ->assertSee($day->date);
    }

    /** @test */
    function an_authenticated_user_can_see_their_days_and_progress()
    {
        $this->signIn();

        $days = create('App\Day', [], 3);

        foreach ($days as $day) {
            $this->post('/app/days', $day->toArray());
        }

        $this->get('/app/days')
             ->assertSee($days[0]->date)
             ->assertSee($days[1]->date)
             ->assertSee($days[2]->date);;
    }

    /** @test */
    function an_authenticated_user_can_add_foods_to_their_days()
    {
        $this->signIn();

        $day = create('App\Day', ['user_id' => auth()->id()]);

        $food = ['name' => 'Kale', 'description' => 'leafy goodness', 'type' => 0, 'processed' => 0];

        $this->post('/app/days/$day->id/foods', $food);
        
        $food['day_id'] = $day->id;

        $this->assertDataBaseHas('foods', $food);
    }
}