<?php
namespace App\Services\UserServices;

use App\Models\User;
class userDelete {
  
  public function execute($data, $id) {
    
    $user = User::where('id', $id)->first();

    if(!$user) {
      return response([
        'status' => 'failed',
        'errror' => 'user not found or username is incorrect'
      ]);
    }
    if($data['username'] == $user['username']) {
      $user->delete();
        return response([
          'status' => 'successful',
          ]);
    } else {
        return response([
        'status' => 'failed',
        'error' => 'user not found or username is incorrect'
        ]);
    }
    }
}