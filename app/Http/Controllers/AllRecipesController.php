<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllRecipesController extends Controller
{
		private $baseUrl = "https://nfact-recipes.herokuapp.com/api/allrecipes/";

    public function show($slug)
    {

    	$apiUrl = $this->baseUrl . $slug . '/';

	    return resolve('App\PVMicroservices\RecipeScraper')->get($apiUrl)->getBody();
    }
}
