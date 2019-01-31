<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IngredientTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);


        //relacoes user 1
        $user1 = \App\User::find(1);
        $user1->ingredients()->syncWithoutDetaching([1,2,3,4]);
        $user1->products()->attach([1,2,3,4], ['feedback' => true]);
        $user1->favourites()->syncWithoutDetaching([1,2,3,4,5,6,7,8,9]);


        //relacoes user 2
        $user2 = \App\User::find(2);
        $user2->ingredients()->syncWithoutDetaching([1,2,3,4,5,6,7,8,9,10,11,12,13,14]);
        $user2->products()->syncWithoutDetaching([1,2,3,4]);
        $user2->favourites()->syncWithoutDetaching([2,3,5,6,7,9,11]);



        //relacoes product 10
        $product10 = \App\Product::find(10);
        $product10->ingredients()->attach([4,5,6,7]);


        //relacoes product 11
        $product11 = \App\Product::find(11);
        $product11->ingredients()->attach([7,8,9,10]);


        //relacoes product 12
        $product12 = \App\Product::find(12);
        $product12->ingredients()->attach([15,16]);


        //relacoes product 13

        $product13 = \App\Product::find(13);
        $product13->ingredients()->attach([7,17,18,19,20,21,22,92]);


        //relacoes product 14
        $product14 = \App\Product::find(14);
        $product14->ingredients()->attach([5,23,24,25,26,27,28,29,30,31,32,34]);


        //relacoes product 15
        $product15 = \App\Product::find(15);
        $product15->ingredients()->attach([5,6,7,11,12,16,36,37,38,39,40,41,44,45,46,47,48,49,50,51,52,53,54,62]);


        //relacoes product 16
        $product16 = \App\Product::find(16);
        $product16->ingredients()->attach([1,4,7,15,16,30,36,37,46,55,56,57,59,60,61,62,65,66,67,84]);


        //relacoes product 6
        $product6 = \App\Product::find(6);
        $product6->ingredients()->attach([5,7,13,33,51,68,69,70,71,72,73,74]);


        //relacoes product 7
        $product7 = \App\Product::find(7);
        $product7->ingredients()->attach([5,7,13,33,51,68,69,70,71,72,73,74]);


        //relacoes product 8
        $product8 = \App\Product::find(8);
        $product8->ingredients()->attach([7,24,80]);


        //relacoes product 9
        $product9 = \App\Product::find(9);
        $product9->ingredients()->attach([2,6,7,30,37,52,58,61,62,63,81,82,83,84,85,86,87,88,89,90]);

        //relacoes product 3
        $product3 = \App\Product::find(3);
        $product3->ingredients()->attach([2,8]);
    }
}
