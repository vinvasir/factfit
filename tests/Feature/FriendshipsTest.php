<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FriendshipsTest extends TestCase
{
  use DatabaseTransactions;

  public function setUp()
  {
    parent::setUp();
    $this->otherUser = create('App\User');
  }

  /** @test */
  function a_user_may_friend_request_another_user()
  {
    $this->signIn();

    $this->post('/friend-requests/{$this->otherUser->id}')
         ->assertDatabaseHas('friendships', [
          'friender_id' => auth()->id(),
          'friended_id' => $this->otherUser->id,
          'status' => 'pending'
         ]);

    $friendRequest = \DB::table('friendships')->where([
      'friender_id' => auth()->id(), 'friended_id' => $this->otherUser->id])
      ->firstOrFail();

    $this->assertContains($friendRequest, $this->otherUser->incomingFriendRequests);
    $this->assertContains($friendRequest, auth()->user()->fresh()->outboundFriendRequests);
  }
}