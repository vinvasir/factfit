<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
		protected $fillable = ['user_id', 'day_id', 'name', 'processed', 'type', 'meal', 'description'];

		protected static function boot()
		{
				parent::boot();

				static::created(function($food) {
						if ($food->type < 10) {
							$food->day->good_food_count = $food->day->good_food_count + 1;
						} else {
							$food->day->bad_food_count = $food->day->bad_food_count + 1;
						}

						$food->day->save();
						$food->day->setProgress();
				});
		}

		public $typeNames = [
				'Leafy Greens',
				'Cruciferous Vegetables',
				'Starchy Plants',
				'Colorful Starch',
				'Citrus Fruits',
				'Apples',
				'Berries',
				'Sweet Fruits',
				'Legumes',
				'Whole Grains',
				'Refined Grains',
				'Processed Candy',
				'Ice Cream',
				'Meat Substitutes',
				'Cheese Substitutes'
		];

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
    		return $this->typeNames[$this->type];
    }

    public function mealName()
    {
    		return $this->mealNames[$this->meal];
    }
}
