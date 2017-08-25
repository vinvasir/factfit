<?php

namespace App\FoodTypes;

class CheeseSub extends FoodType implements FoodTypeInterface {
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
        return 14;
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