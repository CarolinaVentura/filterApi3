<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $ingredients = Ingredient::orderBy('name')->get();
        return $ingredients;
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


    public function store(Request $request)
    {
        $data=$request->only('name');
        $ingredient =\App\Ingredient::create($data);




        return response ([
            'status'=> '201',
            'msg'=>'Ingrediente criado',
            'data'=>$ingredient
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return $ingredient;
    }



    public function edit(Ingredient $ingredient)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $data= $request -> only(['name', 'category_id', 'detach_category_id']);

        if($request->only(['name'])){
            $ingredient->name=$data['name'];
        }

        if($request->only(['category_id'])){

            $id = $data['category_id'];
            $ingredient->categories()->syncWithoutDetaching($id);
        }

        if($request->only(['detach_category_id'])){

            $id = $data['detach_category_id'];
            $ingredient->categories()->detach($id);
        }

        $ingredient->save();
        return response ([
            'status'=> '200',
            'msg'=>'Ok',
            'data'=>$ingredient
        ], 200);
    }


    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response ([
            'status'=>200,
            'data'=>$ingredient,
            'msg'=>'Ingrediente eliminado'
        ],200);
    }



}
