<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllRecipesController extends Controller
{
		private $baseUrl = "https://nfact-recipes.herokuapp.com/api/allrecipes/";

    public function show($slug)
    {

    	$apiUrl = $this->baseUrl . $slug;

    	$client = new \GuzzleHttp\Client();

      $response = $client->request('GET', $apiUrl, [
      	'headers' => [
      		'Authorization' => 'Token ' . env("RECIPE_API_KEY")
      	]
      ]);

      return $response;
    }
}