<?php

namespace App\Foodtypes;

class FoodTypeFactory {

	private static $classNamesByIndex = [
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

	private static $classNames = [
		'Leafy Greens' => 'LeafyGreen',
		'Cruciferous Vegetables' => 'CruciferousVeggie',
		'Starchy Plants' => 'StarchyPlant',
		'Colorful Starch' => 'ColorfulStarch',
		'Citrus Fruits' => 'CitrusFruit',
		'Apples' => 'Apple',
		'Berries' => 'Berry',
		'Sweet Fruits' => 'SweetFruit',
		'Legumes' => 'Legume',
		'Whole Grains' => 'WholeGrain',
		'Refined Grains' => 'RefinedGrain',
		'Processed Candy' => 'ProcessedCandy',
		'Ice Cream' => 'IceCream',
		'Meat Substitutes' => 'MeatSub',
		'Cheese Substitutes' => 'CheeseSub'
	];

	public static function make($typeName, $foodModel) {
		return new self::$classNames[$typeName]($foodModel);
	}

	public static function makeById($id, $foodModel) {
		$typeName = self::$classNamesByIndex[$id];

		return static::make($typeName, $foodModel);
	}

	public static function foodTypeNames()
	{
			return array_keys(self::$classNames);
	}
}