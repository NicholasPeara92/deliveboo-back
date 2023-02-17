<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();

        return view('admin.restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();

        if ($restaurant !== null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.index')->with(['message'=>'you can not create another shop']);
        }else{
            $restaurantForm = new Restaurant();
            $categories = Category::all();
            
            return view('admin.restaurant.create', compact(['restaurantForm', 'categories']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $new_restaurant = new Restaurant();
        $new_restaurant->fill($data);
        $new_restaurant->slug = Str::slug($new_restaurant->name);
        $user = Auth::user()->id;
        $new_restaurant->user_id = $user;
        $new_restaurant->save();

        return redirect()->route('admin.restaurant.index')->with('message', "Il ristorante $new_restaurant->name è stato creato");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();
        return view('admin.restaurant.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        $old_name = $restaurant->name;
        $restaurant->slug = Str::slug($data['name']);
        
        $restaurant->update($data);

        $categories = isset($data['categories']) ? $data['categories'] : [];
        $restaurant->categories()->sync($categories);
        

        return redirect()->route('admin.restaurant.index')->with('message', "Il ristorante $old_name è stato aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $old_name = $restaurant->name;

        $restaurant->delete();

        return redirect()->route('admin.restaurant.index')->with('message', "Il ristorante $old_name è stato cancellato");
    }
}
