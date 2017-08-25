<?php

namespace App\FoodTypes;

class CruciferousVeggie implements FoodType {
	public function typeName() 
    {
        return 'Cruciferous Vegetables';
    }

    public function id() 
    {
        return 1;
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