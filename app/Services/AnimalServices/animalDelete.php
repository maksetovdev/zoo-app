<?php

namespace App\Services\AnimalServices;

use App\Models\Animal;
use App\Models\Img;
use App\Models\Location;
use Illuminate\Contracts\Cache\Store;

class animalDelete {
  public function execute($id) {
    $animal = Animal::findOrFail($id);
    $animal->delete();
  }
}
