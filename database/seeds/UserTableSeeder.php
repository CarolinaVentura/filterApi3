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
            'password'=>bcrypt('Tomate12$')

        ]);

        \App\User::create([
            'name'=> 'Gabriel Faria',
            'email'=>'g.martinsfaria@ua.pt',
            'password'=>bcrypt('Manteiga81.')

        ]);

        \App\User::create([
            'name'=> 'Alexandra Cardoso',
            'email'=>'malexandracardoso@ua.pt',
            'password'=>bcrypt('Vitamina50#')

        ]);

        App\User::create([
            'name'=> 'Albert Einstein',
            'email'=>'einstein@ua.pt',
            'password'=>bcrypt('E=Emcquadrado_1')

        ]);

        App\User::create([
            'name'=> 'Thomas Edison',
            'email'=>'edison@ua.pt',
            'password'=>bcrypt('Lincandescente31*')

        ]);

        App\User::create([
            'name'=> 'admin',
            'email'=>'admin@ua.pt',
            'password'=>bcrypt('Lincandescente31*')

        ]);



    }


}
