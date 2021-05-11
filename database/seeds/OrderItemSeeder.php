<?php

use Illuminate\Database\Seeder;

use App\OrderItems;

class OrderItemSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	OrderItems::truncate();
        factory(OrderItems::class, 200)->create();
    }
}
