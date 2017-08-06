<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
		protected $fillable = ['type'];

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

    public function day()
    {
    		return $this->belongsTo(Day::class);
    }

    public function typeName()
    {
    		return $this->typeNames[$this->type];
    }
}
