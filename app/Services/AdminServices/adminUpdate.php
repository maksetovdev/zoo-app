<?php

namespace App\Services\AdminServices;

use App\Services\BaseService;
use App\Models\User;

class adminUpdate extends BaseService {
  public function rules()
  {
    return [];
  }
  public function execute($data, $id): bool {
    $this->validate($data);
    if(isset($data['username'])) {
      User::where('id', $id)->update(['username' => $data['username']]);
    }
    if(isset($data['phone'])) {
      User::where('id', $id)->update(['username' => $data['phone']]);
    }
    if(isset($data['region_id'])) {
      User::where('id', $id)->update(['username' => $data['region_id']]);
    }
    if(isset($data['password'])) {
      User::where('id', $id)->update(['username' => $data['password']]);
    }
    return true;
  }
}