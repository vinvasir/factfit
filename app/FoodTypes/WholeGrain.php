<?php

namespace App\FoodTypes;

class WholeGrain extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Whole Grains';
    }

    public function id() 
    {
        return 9;
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