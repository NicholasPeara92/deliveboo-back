<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
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
        // Seleziono solo i prodotti con la foreign key di quel ristorante
        $products = Product::where('restaurant_id', $restaurant->id)->get();

        return view('admin.product.index', compact('products'));
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
        $new_product->slug = Str::slug($new_product->name);
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();
        $new_product->restaurant_id = $restaurant->id;
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
        return view('admin.product.show', compact('product'));
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
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
