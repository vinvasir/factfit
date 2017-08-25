<?php

namespace App\FoodTypes;

class Apple extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Apples';
    }

    public function id() 
    {
        return 5;
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