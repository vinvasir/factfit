<?php

namespace App\FoodTypes;

class ProcessedCandy extends FoodType implements FoodTypeInterface {
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
        return 11;
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