<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class OrderController extends Controller
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
        $orders = Order::all();
        $products = [];
        if ($restaurant === null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.create');
        }else{
            $products = Product::where('restaurant_id', $restaurant->id)->get();
            return view('admin.order.index', compact('products', 'restaurant', 'orders'));            
        }

        foreach ($orders as $order){
            foreach($order->products as $product){
                if($product->restaurant_id === $restaurant->id){
                    array_push($products, $product);
                }
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();
        $userOrder = false;

        if ($restaurant === null) { //checks if the user has a restaurant or not 
            return redirect()->route('admin.restaurant.create');
        }else{
            $products = Product::where('restaurant_id', $restaurant->id)->get();
            foreach ($products as $product) {
                foreach($product->orders as $orderP){
                    if($order->id === $orderP->id){
                        $userOrder = true;
                    }
                }
            }  

            if($userOrder){
                return view('admin.order.show', compact('order', 'restaurant'));
            }else{
                return redirect()->route('admin.order.index');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $old_order = $order->id;
        
        $order->delete();

        return redirect()->route('admin.order.index')->with('message', "Il ristorante $old_order è stato cancellato");
    }
}
