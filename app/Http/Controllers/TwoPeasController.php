<?php

namespace App\Http\Controllers;

use App\Interfaces\RecipeControllerInterface;
use Illuminate\Http\Request;

class TwoPeasController extends RecipeController implements RecipeControllerInterface
{
		protected $pathPrefix = 'twopeasandtheirpod/';
}
