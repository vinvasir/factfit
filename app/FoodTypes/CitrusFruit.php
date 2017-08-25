<?php

namespace App\FoodTypes;

class CitrusFruit extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Citrus Fruit';
    }

    public function id() 
    {
        return 3;
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