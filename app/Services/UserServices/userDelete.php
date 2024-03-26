<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class userDelete extends BaseService {

  public function rules()
  {
    return[
      'username' => 'required',
    ];
  }
  public function execute($data, $id) {
      $this->validate($data);
      $user = User::where('id', $id)->first();

      if($data['username'] !== $user['username'])
      {
        throw new ModelNotFoundException();
      }
      $user->delete();
      return true;
    }

}