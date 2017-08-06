<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function day()
    {
    		return $this->belongsTo(Day::class);
    }
}
