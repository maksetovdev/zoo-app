<?php

namespace App\Services\AnimalServices;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;

class AllAnimalLike
{
    public function execute($id)
    {
        $animal = Animal::find($id);
        $oldLike = $animal->like;
        $animal->update(['like' => $oldLike + 1]);
        return new AnimalResource($animal);
    }
}
