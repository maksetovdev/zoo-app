<?php

namespace App\Services\AnimalServices;

use App\Models\Animal;
use App\Models\Img;
use App\Models\Location;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class animalStore {
  public function execute($data) {
    $location = Location::create([
      'latitude' => $data['latitude'],
      'longitude' => $data['longitude']
    ]);


  $animal = auth()->user()->animals()->create([
    'name' => $data['name'],
    'region_id' => $data['region_id'],
    'price' => $data['price'],
    'description' => $data['description'],
    'category_id' => $data['category_id'],
    'location_id' => $location->id,
    ]);

    foreach ($data['images'] as $image) {
      $imgNameWithPath = Storage::putFileAs('animal-img', $image, time().$image->getClientOriginalName());
      $imgNameWithExplodes = explode("/", $imgNameWithPath);
      $imgName = $imgNameWithExplodes[count($imgNameWithExplodes)-1];
      Img::create([
          'animal_id' => $animal->id,
          'img_name' =>  $imgName,
      ]);
    }
    return $animal;
  }
}
