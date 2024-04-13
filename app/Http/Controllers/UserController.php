<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDeleteRequest;
use App\Models\User;
use App\Services\UserServices\userDelete;
use App\Services\UserServices\userLogin;
use App\Services\UserServices\userStore;
use App\Services\UserServices\userUpdate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        try {
            [$user, $token] = app(userLogin::class)->execute($request->all());
            return response([
                'user' => $user,
                'token' => $token
            ]);
        } catch (ValidationException $error) {
            return response([
                'error' => $error->validator->errors()->all()
            ]);
        } catch (ModelNotFoundException $m_error) {
            return response([
                'error' => 'User not found or password is incorrect!'
            ]);
        }

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
    public function show()
    {
        return Auth::user();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            return app(userUpdate::class)->execute($request->all(),$id);
        } catch (ValidationException $error) {
            return response([
                'error' => $error->validator->errors()->all()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userDeleteRequest $request, $id)
    {
        return app(userDelete::class)->execute($request->all(), $id);
    }
}
