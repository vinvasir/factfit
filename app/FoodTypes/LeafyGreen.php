<?php

namespace App\FoodTypes;

class LeafyGreen extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Leafy Green';
    }

    public function id() 
    {
        return 0;
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