<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
	protected $fillable = ['user_id', 'date'];

    protected $with = ['foods'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function setProgress()
    {
				$food_progress = $this->good_food_count / ($this->good_food_count + $this->bad_food_count);

				$this->food_goal_progress = $food_progress;

				$this->save();
    }

    public function addFood($requestParams)
    {
    		$this->foods()->create($requestParams);
    }
}
