<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {

        return view('home', [
            "recipes" => $this->getRecipes()
        ]);
    }

    public function getRecipes(Int $offset = 0, Int $limit = 3)
    {
        return Recipe::latest()->offset($offset)->limit($limit)->get();
    }
}
