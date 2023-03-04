<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100', 
            'surname' => 'required|string|max:50',
            'email' => 'required|string',
            'telephone' => 'required|string|max:10', 
            'total' => 'required|decimal:2',
            'address' => 'required|string'
        ]);
        
        $data = $request->all();

        $new_order = new Order();
        $new_order->name = $data['name'];
        $new_order->surname = $data['surname'];
        $new_order->address = $data['address'];
        $new_order->telephone = $data['telephone'];
        $new_order->total = $data['total'];
        $new_order->email = $data['email'];
        $new_order->create_order = now();
        $new_order->save();

        foreach($data['products'] as $product) {
            
            $productAssociation = Product::where('id', $product['id'])->first();

            $new_order->products()->attach($productAssociation, [
                'quantity' => $product['quantity'],
            ]);
            $new_order->update();
        }

    }
}
