<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // Prendo l'id del ristorante dello user
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();

        if ($restaurant === null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.create');
        }else{
            
            $products = Product::where('restaurant_id', $restaurant->id)->get();
            return view('admin.product.index', compact('products', 'restaurant'));
        }
        // Seleziono solo i prodotti con la foreign key di quel ristorante
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $new_product = new Product();
        $new_product->fill($data);
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();
        $new_product->restaurant_id = $restaurant->id;
        $new_product->slug = Str::slug($new_product->restaurant_id." ".$new_product->name);

        if( isset($data['image']) ){
            $new_product->image = Storage::disk('public')->put('uploads', $data['image']);
        }

        $new_product->save();

        return redirect()->route('admin.product.index')->with('message', "Il prodotto $new_product->name è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();
        return view('admin.product.show', compact('product','restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();

        if ( isset($data['image']) ) {
            if( $product->image ) {
                Storage::delete($product->image);
            }
            $data['image'] = Storage::disk('public')->put('uploads', $data['image']);
        }

        if( isset($data['no_image']) && $product->image  ) {
            Storage::disk('public')->delete($product->image);
            $product->image = null;
        }

        $product->slug = Str::slug($product->restaurant_id." ".$data['name']);

        $product->update($data);

        return redirect()->route('admin.product.index', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if( $product->image ) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
