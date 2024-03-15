<?php

namespace App\Services\RegionServices;

use App\Models\Region;
use App\Services\BaseService;

class updateRegion extends BaseService
{
  public function rules()
  {
    return [
      'name' => 'required'
    ];
  }

  public function execute($data,$id)
  {
    $this->validate($data);
    $region = Region::where('id', $id)->first();
    $region->update(["name" => $data['name']]);
    return $region;
  }
}