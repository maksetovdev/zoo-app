<?php

namespace App\Services\RegionServices;

use App\Models\Region;
use App\Services\BaseService;

class regionStore extends BaseService
{
  public function rules()
  {
    return [
      'name' => 'required'
    ];
  }

  public function execute($data)
  {
    $this->validate($data);
    return $region = Region::create(
      [
        'name' => $data['name']
      ]
      );
    
  }
  
}