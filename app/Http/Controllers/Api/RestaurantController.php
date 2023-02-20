<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    
    public function index()
    {
        $restaurants = Restaurant::with('category')->get();

        return $restaurants;
    }

  
    public function show($slug)
    {
        try {
            $restaurant = Restaurant::where('slug', $slug)->with('category')->firstOrFail();
            return $restaurant;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Post not found'
            ], 404);
        }
    }

}
