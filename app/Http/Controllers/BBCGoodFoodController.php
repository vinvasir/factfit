<?php

namespace App\Http\Controllers;

use App\Interfaces\RecipeControllerInterface;
use Illuminate\Http\Request;

class BBCGoodFoodController extends RecipeController implements RecipeControllerInterface
{
    public $pathPrefix = 'bbcgoodfood/';
}
