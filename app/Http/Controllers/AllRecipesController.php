<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class AllRecipesController extends Controller
{
		private $baseUrl = "https://nfact-recipes.herokuapp.com/api/allrecipes/";

    public function show($slug)
    {

    	$apiUrl = $this->baseUrl . $slug . '/';
    	// 
    	// $apiUrl = 'https://www.anddit.com/hope-portal-api/api/v1/catalog';

    	$headers = [
    		'Authorization' => 'Token ' . env("RECIPE_API_KEY")
    	];

    	$client = new \GuzzleHttp\Client();

    	// dd($client);

    	$authHeader = 'Token ' . env("RECIPE_API_KEY");

    	// dd(['url' => $apiUrl, 'auth' => $authHeader]);

    	$response = $client->request('GET', $apiUrl, ['headers' => [
      		'Authorization' => $authHeader
	      ]
	    ]);

	    return $response->getBody();
    }
}
