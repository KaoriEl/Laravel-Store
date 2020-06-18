<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++)
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'title' =>'Category '. $i,
                'desc' => 'test text',
                'alias' => 'Category '. $i,
                'img' => 'categories.jpg',
            ]);
    }
}
