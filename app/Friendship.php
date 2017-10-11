<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
	protected $fillable = ['friender_id', 'friended_id', 'status'];
}
