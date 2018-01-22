<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RecipeSearchController extends Controller
{
  public function index(Request $request)
  {
    return  view('recipe_search.index');
  }
}
