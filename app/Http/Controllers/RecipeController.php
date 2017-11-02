<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller {
		protected $scraper;

		protected $baseUrl = '';

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}
}