<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServices\userStore;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(gettype($request));   
        try
        {
            [$user, $token] = app(userStore::class)->execute($request->all());
            return response([
                'user data' => $user,
                'token' => $token,
            ]);
        }
        catch(ValidationException $error)
        {
            return response([
                'error' => $error->validator->errors()->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
