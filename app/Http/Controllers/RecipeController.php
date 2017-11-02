<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller {
		protected $scraper;

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}
}