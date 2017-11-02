<?php

namespace App\Http\Controllers;

use App\Interfaces\RecipeControllerInterface;
use Illuminate\Http\Request;

class TwoPeasController extends RecipeController implements RecipeControllerInterface
{
		public $pathPrefix = 'twopeasandtheirpod/';

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
