<?php

namespace App\Http\Controllers;

use App\Interfaces\RecipeControllerInterface;
use Illuminate\Http\Request;

class AllRecipesController extends RecipeController implements RecipeControllerInterface
{
		protected $pathPrefix = 'allrecipes/';

    // public function show($slug)
    // {
	   //  return $this->buildRequest($slug)->getBody();
    // }

    // public function buildRequest($str = '')
    // {
    // 	$endpoint = $this->pathPrefix . $str . '/';

    // 	return $this->scraper->get($endpoint);
    // }
}
