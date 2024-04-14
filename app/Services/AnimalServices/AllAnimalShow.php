<?php

namespace App\Services\AnimalServices;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;

class AllAnimalShow
{
    public function execute($id)
    {
        $animal = Animal::find($id);
        $oldQuantity = $animal->quantity;
        $animal->update(['quantity' => $oldQuantity + 1]);
        return new animalResource($animal);
    }
}
