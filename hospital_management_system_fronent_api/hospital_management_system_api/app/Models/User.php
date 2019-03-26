<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

protected $table = 'user';

protected $fillable = ['user_username', 'user_password'];

public function setPassword($password){
   $this->update(['password' => password_hash($password, PASSWORD_DEFAULT)]);
 }

 public function order(){
   return $this->hasOne('App\Models\Order', 'order_id');
 }

}
