<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllRecipesController extends Controller
{
    public function show($slug)
    {

	    return resolve('App\PVMicroservices\RecipeScraper')->get($slug . '/')->getBody();
    }
}
