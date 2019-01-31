<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name'=>'Malteasers',
            'barcode'=>'5000159020312'

        ]);

        \App\Product::create([
            'name'=>'Kit Kat',
            'barcode'=>'5000159020313'

        ]);

        \App\Product::create([
            'name'=>'Leite Meio Gordo Pingo Doce',
            'barcode'=>'5601009937103'

        ]);

        \App\Product::create([
            'name'=>'Oreo',
            'barcode'=>'7622300281182'

        ]);


        \App\Product::create([
            'name'=>'Bolachas Digestive Amanhecer',
            'barcode'=>'5601227037821'

        ]);

        \App\Product::create([
            'name'=>'Winkier Hot Dog',
            'barcode'=>'4010142939058'

        ]);

        \App\Product::create([
            'name'=>'Manteiga Líquida Vaqueiro',
            'barcode'=>'5601165003261'

        ]);

        \App\Product::create([
            'name'=>'Polpa de Tomate Guloso',
            'barcode'=>'5601019012401'

        ]);

        \App\Product::create([
            'name'=>'Milka Oreo',
            'barcode'=>'7622300631574'

        ]);

        \App\Product::create([
            'name'=>'Milho Doce',
            'barcode'=>'3596710395460'

        ]);

        \App\Product::create([
            'name'=>'Queijo Fresco Auchan',
            'barcode'=>'5601002065735'

        ]);

        \App\Product::create([
            'name'=>'Cevada Auchan',
            'barcode'=>'5601002109347'

        ]);

        \App\Product::create([
            'name'=>'Salsa e Alho',
            'barcode'=>'5601066632799'

        ]);

        \App\Product::create([
            'name'=>'Powerade',
            'barcode'=>'54492653'

        ]);

        \App\Product::create([
            'name'=>'Thins Pao Integral',
            'barcode'=>'8412600024317'

        ]);

        \App\Product::create([
            'name'=>'Barras Cereais Muesly Linea Choc Branco ',
            'barcode'=>'8410175059116'

        ]);


    }
}
