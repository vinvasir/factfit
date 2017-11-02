<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllRecipesController extends Controller
{
		private $scraper;

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}

    public function show($slug)
    {
	    return $this->scraper->get($slug . '/')->getBody();
    }
}
