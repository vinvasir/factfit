<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class RecipeController extends Controller {
		protected $scraper;

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}
}