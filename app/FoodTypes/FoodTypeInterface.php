<?php

namespace App\FoodTypes;

interface FoodTypeInterface {
	public function typeName();

	public function id();

	public function processed();

	public function goodFood();
}