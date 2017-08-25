<?php

namespace App\FoodTypes;

class FoodType {
	public function updateCountsForDay()
	{
		if($this->goodFood()) {
			$this->foodModel->day->increment('good_food_count');
		} else {
			$this->foodModel->day->increment('bad_food_count');
		}
	}
}