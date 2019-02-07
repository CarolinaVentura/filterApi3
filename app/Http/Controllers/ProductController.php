<?php

namespace App\Http\Controllers;

use App\Product;
use App\Ingredient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::orderBy('name')->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only('name', 'barcode');
        $product= Product::create($data);

        $ingredients = Ingredient::find([1,2]);
        $product->ingredients()->attach($ingredients);


        return response([
           'status'=>201,
            'data'=>$product,
            'msg'=> 'Produto criado com sucesso'
        ],201);
    }


    public function show(Product $product)
    {
        //
        return $product;
    }


    public function update(Request $request, Product $product)
    {
        $data= $request -> only(['name','barcode', 'ingredient_id']);


        //verificar se o campo titulo,data e descricao foram preenchidos
        if($request->only(['name'])){
            $product->name=$data['name'];
        }
        if($request->only(['email'])){
            $product->barcode=$data['barcode'];
        }


        if($request->only(['ingredient_id'])){


            $id = $data['ingredient_id'];
            // $ingredients = Ingredient::find($array);
            // $user->ingredients()->attach($ingredients);
            $product->ingredients()->syncWithoutDetaching($id);
        }

        $product->save();

        return response ([
            'status'=> '200',
            'msg'=>'Alteração guardada com sucesso',
            'data'=>$product
        ], 200);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return response ([
            'status'=>200,
            'data'=>$product,
            'msg'=>'Utilizador eliminado'
        ],200);

    }

    public function showIngredients(Product $product){


        $product_id = $product['id'];

        $ingredients = Product::find($product_id)->ingredients()->orderBy('name')->get();



        return response ([
            'status'=>200,
            'data'=>$ingredients,
            'msg'=>'MERDA PA ISTO TUDO'
        ],200);
    }


    public function getProduct($barcode){


        $productScanned = Product::where('barcode', '=', $barcode)->get();

        $elementos = count($productScanned);

        if($elementos <= 0){
            return response ([
                'status'=>404,
                'data'=>$productScanned,
                'msg'=>'Este produto não existe na nossa base de dados...'
            ],404);
        } else{
            return response ([
                'status'=>200,
                'data'=>$productScanned,
                'msg'=>'Scan efetuado com sucesso'
            ],200);


        }
    }

}
