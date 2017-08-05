<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function setProgress()
    {
    		$food_progress = $this->good_food_count / ($this->good_food_count + $this->bad_food_count);

    		$this->food_goal_progress = $food_progress;

    		$this->save();
    }
}
