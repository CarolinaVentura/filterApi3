<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Validation\Rules\In;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $users = User::All();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {

    }*/


    public function store(UserStoreRequest $request)
    {


        $data=$request->only('name', 'email','password', 'profile_image', 'ingredient_id', 'product_id');
        if(!$request->file(['profile_image'])){
            $data['profile_image']='userImages/default.png';
        } else {
            $path = $request->file('profile_image')->store('userImages', 'public');
            $data['profile_image'] = $path;
        }

        $data['password']=bcrypt($data['password']);
        $user=\App\User::create($data);


        $array = $data['ingredient_id'];
        $arrayProducts = $data['product_id'];

        $ingredients = Ingredient::find($array);
        $user->ingredients()->attach($ingredients);

        $products = Product::find($arrayProducts);


        return response ([
            'status'=> '201',
            'msg'=>'Utilizador criado',
            'data'=>$user
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data= $request -> only(
            [
                'name',
                'email',
                'password',
                'profile_image',
                'ingredient_id',
                'product_id',
                'feedback',
                'fav_id',
                'detach_ing_id',
                'detach_fav_id'
            ]);

        //return $data['ingredient_id'];
        //verificar se o campo titulo,data e descricao foram preenchidos
        if($request->only(['name'])){
            $user->name=$data['name'];
        }

        if($request->only(['email'])){
            $user->email=$data['email'];
        }

        if($request->only(['password'])){
            $user->password=bcrypt($data['password']);
        }

        if($request->only(['ingredient_id'])){

            $id = $data['ingredient_id'];
            // $ingredients = Ingredient::find($array);
            // $user->ingredients()->attach($ingredients);
            $user->ingredients()->syncWithoutDetaching($id);
        }

        if($request->only(['detach_ing_id'])){

            $id = $data['detach_ing_id'];
            $user->ingredients()->detach($id);
        }

        if($request->only(['product_id'])){

            $arrayProducts = $data['product_id'];
            $feed = $data['feedback'];
            $user->products()->attach($arrayProducts, ['feedback' => $feed]);
        }

        if($request->only(['fav_id'])){

            $arrayFavourites = $data['fav_id'];
            $user->favourites()->syncWithoutDetaching($arrayFavourites);
        }

        if($request->only(['detach_fav_id'])){

            $arrayFavourites = $data['detach_fav_id'];
            $user->favourites()->detach($arrayFavourites);
        }

        if($request->file(['profile_image'])){
            $path = $request ->file('profile_image')->store('userImages', 'public');
            $data['profile_image'] = $path;
            $user->profile_image=$data['profile_image'];
        }



        $user->save();

        return response ([
            'status'=> '200',
            'data'=>$user,
            'msg'=>'Alteração guardada com sucesso',
        ], 200);

    }



    public function destroy(User $user)
    {
        $user->delete();
        return response ([
            'status'=>200,
            'data'=>$user,
            'msg'=>'Utilizador eliminado'
        ],200);
    }

    public function showIngredients(User $user){


        $user_id = $user['id'];

        $ingredients = User::find($user_id)->ingredients()->orderBy('name')->get();



        return response ([
            'status'=>200,
            'data'=>$ingredients,
            'msg'=>'MERDA PA ISTO TUDO'
        ],200);
    }

    public function showProducts(User $user){


        $user_id = $user['id'];

        $products = User::find($user_id)->products()->orderBy('')->get();



        return response ([
            'status'=>200,
            'data'=>$products,
            'msg'=>'MERDA PA ISTO TUDO'
        ],200);
    }

    public function showFavourites(User $user){


        $user_id = $user['id'];

        $products = User::find($user_id)->favourites()->orderBy('name')->get();



        return response ([
            'status'=>200,
            'data'=>$products,
            'msg'=>'MERDA PA ISTO TUDO'
        ],200);
    }

    public function findUserByEmail($email){


        $userByEmail = User::where('email',$email) -> first();

        return response ([
            'status'=>200,
            'data'=>$userByEmail,
            'msg'=>'MERDA PA ISTO TUDO'
        ],200);

    }



}
