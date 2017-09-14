<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FoodTypes\FoodTypeFactory;

class Food extends Model
{
	protected $fillable = ['user_id', 'day_id', 'name', 'processed', 'type', 'type_name', 'type_id', 'meal', 'description'];

	protected static function boot()
	{
			parent::boot();


			static::created(function($food) {
					FoodTypeFactory::make($food->type_name, $food)->updateCountsForDay();
			});
	}

	public $mealNames = [
		'Breakfast',
		'Lunch',
		'Dinner',
		'Snack'
	];

    public function day()
    {
    		return $this->belongsTo(Day::class);
    }

    public function typeName()
    {
		if ($this->type || $this->type === 0) {
				return FoodTypeFactory::makeById($this->type, $this)->typeName();
		} else {
				return (new $this->type_name($this))->typeName();
		}
    }

    public function mealName()
    {
		return $this->mealNames[$this->meal];
    }
 
}
