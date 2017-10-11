<?php

namespace Tests\Feature;
use App\Friendship;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

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

    $this->post('/app/friendships/' . $this->otherUser->id);

    $this->assertDatabaseHas('friendships', [
    'friender_id' => auth()->id(),
    'friended_id' => $this->otherUser->id,
    'status' => 'pending'
    ]);

    $this->assertContains(auth()->id(), $this->otherUser->fresh()->friendshipRequesters->pluck('id'));
    $this->assertContains($this->otherUser->id, auth()->user()->fresh()->friendedUsers->pluck('id'));
  }

  /** @test */
  function a_user_may_approve_incoming_friend_requests()
  {
    $this->signIn();

    $friender = auth()->user();

    $this->post('/app/friendships/' . $this->otherUser->id);

    $this->signIn($this->otherUser);

    $this->assertEquals(auth()->id(), $this->otherUser->id);

    $this->assertContains($friender->id, auth()->user()->fresh()->friendshipRequesters->pluck('id'));

    $this->post('/app/friendships/' . $friender->id . '/accept');

    $friendship = Friendship::where(['friender_id' => $friender->id, 'friended_id' => auth()->id()])->firstOrFail();

    $this->assertEquals('approved', $friendship->status);

    $friendedsFriendIds = auth()->user()->fresh()->friends()->pluck('id');
    $friendersFriendIds = $friender->fresh()->friends()->pluck('id');
    $friendersFriendId = $friender->fresh()->friends()->toArray()[0]['id'];

    $this->assertContains($friender->id, $friendedsFriendIds);
    $this->assertEquals(auth()->user()->fresh()->id, $friendersFriendId);
    $this->assertContains(auth()->user()->fresh()->id, $friendersFriendIds);
  }
}