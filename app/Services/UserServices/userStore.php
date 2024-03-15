<?php

namespace App\Services\UserServices;

use App\Services\BaseService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userStore extends BaseService
{
  public function rules()
  {   
    return [
      'username' => 'required',
      'phone' => 'required|unique:users,phone',
      'region_id' => 'required',
      'password' => 'required',
      ];
  }
  public function execute($data)
  {
    $this->validate($data);

    $user = User::create([
      'username' => $data['username'],
      'phone' => $data['phone'],
      'region_id' => $data['region_id'],
      'password' => Hash::make($data['password']),
      'role' => 'user',
    ]);

    $token = $user->createToken('user model', ['user'])->plainTextToken;
    return [$user, $token];
  }
}
