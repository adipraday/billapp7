<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Session;
use App\Models\Log_Model;

class Login_Model extends Authenticatable
{
    public static function login($request){
      $username = $request->email;
      // $password = md5($request->password);
      // $user = DB::select("select * from users where username = '$username' and password = Password('$request->password')");
      $user = DB::select("select * from ms00_login where login = '$username' and pswd = Password('$request->password')");
      // dd("select * from ms00_login where login = '$username' and pswd = Password('$request->password')");
        if(empty($user)){
          return false;
        }else{
          $nik = $user[0]->nik;
          $username = $user[0]->login;
          $email = $user[0]->email;
          $password = $user[0]->pswd;
          // Log_Model::saveLog($nik);
          // $user_local = DB::select("select * from users where nik = '$nik'");
          // if(empty($user_local)){
          //   DB::insert("INSERT INTO `users`(`nik`, `email`, `username`, `password`, `role_id`) VALUES ('$nik','$email','$username','$password','0')");
          // }else{
          //   DB::update("UPDATE `users` SET `email`='$email',`username`='$username',`password`='$password' WHERE `nik`='$nik'");
          // }
          // // session(['id' => $user[0]->id]);
          // $user_local = DB::select("select * from users where nik = '$nik'");
          //
          session(['nik' => $nik]);
          session(['username' => $username]);
          



          return true;
        }

    }
    public static function logout(){
      // session()->dest
      // Auth::logout();
      Session::flush();
      return;
    }





    // use Notifiable;
    //
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    //
    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    //
    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
