<?php

namespace App\Services\AnimalServices;

use App\Models\Animal;
use App\Models\Img;
use App\Models\Location;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class animalStore extends BaseService  {
  public function execute($data) {

    $loc_data = [
      'longitude' => $data['longitude'],
      'latitude' => $data['latitude'],
    ];
    $locationId = DB::table('locations')->insertGetId($loc_data);

    $img_data = [
      'img_name' => Storage::putFileAs('animal-img', $data['img'], time().$data['img']->getClientOriginalName())
    ];
    $imgId = DB::table('imgs')->insertGetId($img_data);

    $animal_data = [
      'user_id' => Auth::user()['id'],
      'name' => $data['name'],
      'region_id' => $data['region_id'],
      'price' => $data['price'],
      'description' => $data['description'],
      'location_id' => $locationId,
      'img_id' => $imgId,
      'category_id' => $data['category_id'],
      'like' => 0,
      'quantity' => 1,
      'is_checked' => false,
    ];
    return DB::table('animals')->insertGetId($animal_data);
  }
}