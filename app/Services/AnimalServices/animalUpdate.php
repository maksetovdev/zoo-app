<?php

namespace App\Services\AnimalServices;

use App\Models\Animal;
use Illuminate\Support\Facades\Storage;
use App\Models\Img;

class animalUpdate
{
    public function execute($data, $id)
    {
        $animal = Animal::find($id);
        $imgs = $animal->images;
        foreach ($imgs as $img) {
            Storage::delete('animal-img/'.$img->img_name);
        }
        $location = $animal->location;
        $location->update([
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude']
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
        $animal->update([
            'name' => $data['name'],
            'region_id' => $data['region_id'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
        ]);
        return $animal;
    }
}
