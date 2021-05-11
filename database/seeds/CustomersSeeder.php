<?php

use Illuminate\Database\Seeder;

use App\Customers;

class CustomersSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	Customers::truncate();
        factory(Customers::class, 200)->create();
    }
}
