<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Collection;

abstract class Transformer {
	/**
	 * Transform a collection of lessons
	 *
	 * @param $items
	 * @return  Illuminate\Database\Eloquent\Collection
	 */
	public function transformCollection(Collection $items)
	{
		return $items->map(function($item) {
			return $this->transform($item);
		});
	}

	// public abstract function transform($item)
}