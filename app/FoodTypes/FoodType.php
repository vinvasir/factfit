<?php

namespace App\FoodTypes;

interface FoodType {
	public function typeName();

	public function id();

	public function processed();

	public function goodFood();
}