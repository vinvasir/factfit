<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class RecipeController extends Controller {
		public $scraper;

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}
}