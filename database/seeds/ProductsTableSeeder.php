<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'name'=>'Event Ticket 1',
            'image'=>'uploads/products/ticket1.jpg',
            'price'=>5000,
            'description'=>'Event Ticket 1'
        ];

        $p2 = [
            'name'=>'Event Ticket 2',
            'image'=>'uploads/products/ticket2.jpg',
            'price'=>500,
            'description'=>'Event Ticket 2'
        ];

        $p3 = [
            'name'=>'Event Ticket 3',
            'image'=>'uploads/products/ticket3.jpg',
            'price'=>50,
            'description'=>'Event Ticket 3'
        ];

        Product::create($p1);
        Product::create($p2);
        Product::create($p3);
    }
}
