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
             ->get('/days/create')
             ->assertRedirect('/login');
    }
    /** @test */
    function an_authenticated_user_can_create_new_forum_days()
    {
    		// Given we have an authenticated user
    		$this->signIn();
    		// When we hit the endpoint to create a new day
    		$day = make('App\Day');
    		$response = $this->post('/days', $day->toArray());
    		// Then when we visit the day page
    		$this->get($response->headers->get('Location'))
    		      ->assertSee($day->title)
    			  ->assertSee($day->body);
    }
}