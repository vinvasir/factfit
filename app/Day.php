<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
	protected $fillable = ['user_id', 'date', 'weight', 'good_food_count', 'bad_food_count'];

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
		$food_progress = ($this->good_food_count - $this->bad_food_count) / 10;
        
		$this->food_goal_progress = $food_progress;
// dd($this->good_food_count);
		$this->save();
    }

    public function addFood($requestParams)
    {
		$this->foods()->create($requestParams);
    }
}
