<?php

namespace App\FoodTypes;

class IceCream extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Refined Grains';
    }

    public function id() 
    {
        return 12;
    }

    public function goodFood()
    {
        return false;
    }

    public function processed()
    {
        return true;
    }
}