<?php

namespace App\FoodTypes;

class CruciferousVeggie extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Cruciferous Vegetables';
    }

    public function id() 
    {
        return 1;
    }

    public function goodFood()
    {
        return true;
    }

    public function processed()
    {
        return false;
    }
}