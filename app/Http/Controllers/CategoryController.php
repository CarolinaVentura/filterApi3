<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name')->get();
        return $categories;
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
        //
        $data=$request->only('name');
        $category =\App\Category::create($data);




        return response ([
            'status'=> '201',
            'msg'=>'Categoria criada',
            'data'=>$category
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $data= $request -> only(['name', 'ingredient_id', 'detach_ing_id', 'user_id', 'detach_user_id']);

        if($request->only(['name'])){
            $category->name=$data['name'];
        }

        if($request->only(['ingredient_id'])){
            $id = $data['ingredient_id'];
            $category->ingredients()->syncWithoutDetaching($id);
        }

        if($request->only(['detach_ing_id'])){

            $id = $data['detach_ing_id'];
            $category->ingredients()->detach($id);
        }

        if($request->only(['user_id'])){
            $id = $data['user_id'];
            $category->users()->syncWithoutDetaching($id);
        }

        if($request->only(['detach_user_id'])){

            $id = $data['detach_user_id'];
            $category->users()->detach($id);
        }

        $category->save();
        return response ([
            'status'=> '200',
            'msg'=>'Ok',
            'data'=>$category
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return response ([
            'status'=>200,
            'data'=>$category,
            'msg'=>'Categoria eliminada'
        ],200);
    }

    //ingredientes de uma categoria

    public function showIngredients(Category $category){


        $category_id = $category['id'];

        $ingredients = Category::find($category_id)->ingredients()->orderBy('name')->get();



        return response ([
            'status'=>200,
            'data'=>$ingredients,
            'msg'=>'Mostrou os ingredientes de uma categoria'
        ],200);
    }
}
