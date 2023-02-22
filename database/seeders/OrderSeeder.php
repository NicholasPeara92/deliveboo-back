<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        Schema::disableForeignKeyConstraints();
        //cancello tutti i dati della tabella categories
        Order::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 100 ; $i++) { 
            $new_order = new Order();
            $new_order->name = $faker->name();
            $new_order->surname = $faker->lastName();
            $new_order->address = $faker->streetAddress();
            $new_order->telephone = '3'.$faker->randomNumber(9, true);
            $new_order->email = preg_replace('/@example..*/', '@gmail.com', $faker->unique()->safeEmail);
            $new_order->total = $faker->randomFloat(2, 1, 999);
            $new_order->create_order = $faker->dateTimeBetween('-1 year', '0 days');
            $new_order->save();
        }

        $orders = Order::all();

        foreach($orders as $order) {
            $product = Product::inRandomOrder()->first();
            $order->products()->attach($product);
            $order->update();
        }
    }
}
