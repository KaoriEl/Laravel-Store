<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++)
            \Illuminate\Support\Facades\DB::table('products')->insert([
                'title' =>'Product '. $i,
                'price' => rand(50,3500),
                'in_stock' => 1,
                'description' => 'Test',
                'category_id' => rand(1,2),
                ]);
    }
}
