<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Category::create([
            'name'=>'Intolerância à lactose',

        ]);

        \App\Category::create([
            'name'=>'Alergia ao amendoim',

        ]);

        \App\Category::create([
            'name'=>'Vegetariano',

        ]);
    }
}
