<?php

namespace App\FoodTypes;

class Berry extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Berries';
    }

    public function id() 
    {
        return 6;
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