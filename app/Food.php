<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
		protected $fillable = ['user_id', 'name', 'processed', 'type', 'meal', 'description'];

		protected $typeNames = [
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

		protected $mealNames = [
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
