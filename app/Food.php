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

				// update the legacy code below to handle the new,
				// polymorphic way of setting food type

				// static::created(function($food) {
				// 		if ($food->type < 10) {
				// 			$food->day->good_food_count = $food->day->good_food_count + 1;
				// 		} else {
				// 			$food->day->bad_food_count = $food->day->bad_food_count + 1;
				// 		}

				// 		$food->day->save();
				// 		$food->day->setProgress();
				// });
		}

		// public $typeNames = [
		// 		'Leafy Greens',
		// 		'Cruciferous Vegetables',
		// 		'Starchy Plants',
		// 		'Colorful Starch',
		// 		'Citrus Fruits',
		// 		'Apples',
		// 		'Berries',
		// 		'Sweet Fruits',
		// 		'Legumes',
		// 		'Whole Grains',
		// 		'Refined Grains',
		// 		'Processed Candy',
		// 		'Ice Cream',
		// 		'Meat Substitutes',
		// 		'Cheese Substitutes'
		// ];

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
    		if ($this->type) {
    				return $this->typeNames[$this->type];
    		} else {
    				return $this->type_name;
    		}
    }

    public function mealName()
    {
    		return $this->mealNames[$this->meal];
    }

    // dont actually use this. it's just for tinkering
    public function typeFactoryCallerDontUse($typeName)
    {
    		return FoodTypeFactory::make($typeName, $this);
    }

    // dont actually use this. it's just for tinkering
    public function typeFactoryIncrementerDontUse($typeName)
    {
    		return FoodTypeFactory::make($typeName, $this)->updateCountsForDay();
    }

    // dont actually use this. it's just for tinkering
    public function typeFactoryByIdCallerDontUse($typeId)
    {
    		return FoodTypeFactory::makeById($typeId, $this);
    }    
}
