<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class userLogin extends BaseService {

  public function rules()
  {
    return[
      'phone' => 'required|exists:users,phone',
      'password' => 'required'
    ];
  }
  public function execute($data) {
      $this->validate($data);
      //dd($data);
      $user = User::where('phone', $data['phone'])->first();
      //dd($user);
      if(!$user || !Hash::check($data['password'],$user->password))
      {
        throw new ModelNotFoundException;
      }
      $token = $user->createToken('user model', ['user'])->plainTextToken;
      return [$user, $token];
    }

}