<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller {
		protected $scraper;

		public function __construct(\GuzzleHttp\Client $scraper)
		{
				$this->scraper = $scraper;
		}

    public function show($slug)
    {
	    return $this->buildRequest($slug)->getBody();
    }

    public function buildRequest($str = '')
    {
    	$endpoint = $this->pathPrefix . $str . '/';

    	return $this->scraper->get($endpoint);
    }		
}