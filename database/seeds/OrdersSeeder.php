<?php

use Illuminate\Database\Seeder;

use App\Orders;

class OrdersSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
		Orders::truncate();
        factory(Orders::class, 50)->create();
    }
}
