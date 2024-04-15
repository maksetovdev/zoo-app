<?php

namespace App\Http\Controllers;

use App\Http\Requests\animalStoreRequest;
use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use App\Services\AnimalServices\animalDelete;
use App\Services\AnimalServices\animalShow;
use App\Services\AnimalServices\animalUpdate;
use Illuminate\Http\Request;
use App\Services\AnimalServices\animalStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index()
    {
        return AnimalResource::collection(\auth()->user()->animals);
    }

    public function store(animalStoreRequest $request)
    {
        return new AnimalResource(app(animalStore::class)->execute($request->all()));
    }

    public function show($id)
    {
        return app(animalShow::class)->execute($id);
    }

    public function update(animalStoreRequest $request, $id)
    {
        return app(animalUpdate::class)->execute($request->all(), $id);
    }

    public function destroy($id)
    {
        app(animalDelete::class)->execute($id);
        return response([
            'status' => 'successfully'
        ]);
    }
}
