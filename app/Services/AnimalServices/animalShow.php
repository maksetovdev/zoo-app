<?php

namespace App\Services\AnimalServices;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;

class animalShow
{
    public function execute($id)
    {
        $animal = Animal::find($id);
        return new AnimalResource($animal);
    }
}
