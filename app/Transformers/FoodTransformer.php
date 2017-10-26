<?php

namespace App\Transformers;

class FoodTransformer extends Transformer {
	public function transform($food)
	{
		return [
			'id' => $food->id,
			'name' => $food->name,
			'description' => $food->description,
			'typeName' => $food->typeName(),
			'mealName' => $food->mealName(),
			'processed' => (boolean) $food->processed
		];
	}
}