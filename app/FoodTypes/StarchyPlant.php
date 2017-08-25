<?php

namespace App\FoodTypes;

class StarchyPlant extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Starchy Plant';
    }

    public function id() 
    {
        return 2;
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