<?php

use Illuminate\Database\Seeder;

use App\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	Products::truncate();
        factory(Products::class, 100)->create();
    }
}
