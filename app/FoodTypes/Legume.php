<?php

namespace App\FoodTypes;

class Legume extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Legumes';
    }

    public function id() 
    {
        return 8;
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