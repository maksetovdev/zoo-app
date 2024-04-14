<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use App\Services\AnimalServices\AllAnimalLike;
use App\Services\AnimalServices\AllAnimalShow;
use Illuminate\Http\Request;

class AllAnimal extends Controller
{

    public function index()
    {
        $animals = Animal::all();
        return AnimalResource::collection($animals);
    }

    public function show($id)
    {
        return app(AllAnimalShow::class)->execute($id);
    }

    public function update($id)
    {
        return app(AllAnimalLike::class)->execute($id);
    }
}
