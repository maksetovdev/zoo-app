<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AdminServices\adminStore;
use App\Services\AdminServices\adminUpdate;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function index()
    {   
        return User::where('role', 'admin')->get();
    }
    public function store(Request $request)
    {
        try {
            return app(adminStore::class)->execute($request->all());
        } catch (ValidationException $er) {
            return response([
                'errors' => $er->validator->errors()->all()
            ]);
        }
    }
    public function show(string $id)
    {   
        return User::where('id', $id)->first();
    }
    public function update(Request $request, $id)
    {
        try {
            app(adminUpdate::class)->execute($request->all(), $id);
            return response([
                'status' => 'success',
                'message' => 'Updated'
            ]);
        } catch (ValidationException $error) {
            return response([
                'errors' => $error->validator->errors()->all()
            ]);
        }
    }
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return response([
            'status' => 'success',
            'message' => 'Admin deleted'
        ]);
    }
}
