<?php

namespace App\Foodtypes;

class FoodTypeFactory {

	public static $classNamesByIndex = [
		'Leafy Greens',
		'Cruciferous Vegetables',
		'Starchy Plants',
		'Colorful Starch',
		'Citrus Fruits',
		'Apples',
		'Berries',
		'Sweet Fruits',
		'Legumes',
		'Whole Grains',
		'Refined Grains',
		'Processed Candy',
		'Ice Cream',
		'Meat Substitutes',
		'Cheese Substitutes'
	];

	public static $classNames = [
		'Leafy Greens' => '\LeafyGreen',
		'Cruciferous Vegetables' => '\CruciferousVeggie',
		'Starchy Plants' => '\StarchyPlant',
		'Colorful Starch' => '\ColorfulStarch',
		'Citrus Fruits' => '\CitrusFruit',
		'Apples' => '\Apple',
		'Berries' => '\Berry',
		'Sweet Fruits' => '\SweetFruit',
		'Legumes' => '\Legume',
		'Whole Grains' => '\WholeGrain',
		'Refined Grains' => '\RefinedGrain',
		'Processed Candy' => '\ProcessedCandy',
		'Ice Cream' => '\IceCream',
		'Meat Substitutes' => '\MeatSub',
		'Cheese Substitutes' => '\CheeseSub'
	];

	// this should save the class name after a model calls it
	// the first time, so that future user-facing
	// name changes don't break old data
	public static function make($typeName, $foodModel) {

		if (! array_key_exists($typeName, self::$classNames)) return new $foodModel->type_name($foodModel);

		$foodModel->update(['type_name' => self::getClassName($typeName)]);
// dd(new self::$classNames[$typeName]($foodModel));

		$fullName = '\App\FoodTypes' . self::$classNames[$typeName];

		return new $fullName($foodModel);
	}

	public static function makeById($id, $foodModel) {
		$typeName = self::$classNamesByIndex[$id];

		return static::make($typeName, $foodModel);
	}

	public static function foodTypeNames()
	{
			return array_keys(self::$classNames);
	}

	public static function getClassName($typeName)
	{
			$fullName = "\App\FoodTypes" . self::$classNames[$typeName];

			return $fullName;
	}
}