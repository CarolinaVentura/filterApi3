<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name'=> 'Carolina Ventura',
            'email'=>'carolinaventura@ua.pt',
            'profile_image'=> 'assets/imgs/avatar1.png',

        ]);

        \App\User::create([
            'name'=> 'Gabriel Faria',
            'email'=>'g.martinsfaria@ua.pt',

        ]);

        \App\User::create([
            'name'=> 'Alexandra Cardoso',
            'email'=>'malexandracardoso@ua.pt',

        ]);

        App\User::create([
            'name'=> 'Albert Einstein',
            'email'=>'einstein@ua.pt',

        ]);

        App\User::create([
            'name'=> 'Thomas Edison',
            'email'=>'edison@ua.pt',

        ]);

        App\User::create([
            'name'=> 'admin',
            'email'=>'admin@ua.pt',

        ]);



    }


}
