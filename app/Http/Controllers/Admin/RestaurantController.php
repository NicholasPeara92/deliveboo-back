<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        if ($restaurant === null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.create', compact('restaurant'));
        }else{
            return view('admin.restaurant.index', compact('restaurant'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();

        if ($restaurant !== null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.index')->with(['message'=>'Non puoi creare un altro ristorante']);
        }else{
            $restaurantForm = new Restaurant();
            $categories = Category::all();
            
            return view('admin.restaurant.create', compact('restaurantForm', 'categories', 'restaurant'));
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

        if(isset($data['image'])){
            $new_restaurant->image = Storage::disk('public')->put('uploads', $data['image']);
        }
        $new_restaurant->save();
        if(isset($data['categories'])){
            $new_restaurant->categories ()->sync($data['categories']);
        }

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
        $user = Auth::user()->id;

        if($restaurant->user_id == $user){
            $categories = Category::all();
            return view('admin.restaurant.edit', compact('restaurant', 'categories'));
        }else{
            return redirect()->route('admin.restaurant.index');
        }
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

        if ( isset($data['image']) ) {
            if($restaurant->image ) {
                Storage::disk('public')->delete($restaurant->image);
            }
            $data['image'] = Storage::disk('public')->put('uploads', $data['image']);
        }

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

        if( $restaurant->image ) {
            Storage::disk('public')->delete($restaurant->image);
        }
        
        $restaurant->delete();

        return redirect()->route('admin.restaurant.index')->with('message', "Il ristorante $old_name è stato cancellato");
    }
}
