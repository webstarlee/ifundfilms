<?php

namespace App;

use DateTime;
use \App\Country;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = "admin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'first_name',
         'last_name',
         'username',
         'unique_id',
         'avatar',
         'birth',
         'email',
         'password',
     ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         'password', 'remember_token',
     ];

     // public function sendPasswordResetNotification($token)
     // {
     //     // Your your own implementation.
     //     $this->notify(new ResetPasswordNotification($token));
     // }

     public function getCountry() {
         $country = Country::find($this->nation);
         return $country;
     }
}
