<?php

namespace App\Http\Controllers;

use App\Interfaces\RecipeControllerInterface;
use Illuminate\Http\Request;

class AllRecipesController extends RecipeController implements RecipeControllerInterface
{
		public $pathPrefix = 'allrecipes/';
}
