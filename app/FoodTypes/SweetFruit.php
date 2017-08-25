<?php

namespace App\FoodTypes;

class SweetFruit extends FoodType implements FoodTypeInterface {
	public function __construct($foodModel)
	{
			$this->foodModel = $foodModel;
	}

	public function typeName() 
    {
        return 'Sweet Fruits';
    }

    public function id() 
    {
        return 7;
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