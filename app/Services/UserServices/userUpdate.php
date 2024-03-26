<?php

namespace App\Services\UserServices;

use App\Services\BaseService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userUpdate extends BaseService {
  public function rules() {
    return [

    ];
  }
  public function execute($data, $id) {
      $this->validate($data);
      $user = User::where('id',$id)->first();

      if(isset($data['username'])) {
        $user->update([
          'username' => $data['username']
        ]);
      }

      if(isset($data['phone'])) {
        $user->update([
          'phone' => $data['phone']
        ]);
      }

      if(isset($data['phone'])) {
        $user->update([
          'phone' => $data['phone']
        ]);
      }

      if(isset($data['region_id'])) {
        $user->update([
          'region_id' => $data['region_id']
        ]);
      }

      if(isset($data['region_id'])) {
        $user->update([
          'region_id' => $data['region_id']
        ]);
      }

      if(isset($data['region_id'])) {
        $user->update([
          'region_id' => Hash::make($data['password'])
        ]);
      }
      return true;
  }
}