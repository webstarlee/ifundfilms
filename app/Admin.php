<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//Notification for admin
//use App\Notifications\AdminResetPassword as ResetPasswordNotification;

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
         'username', 'email', 'password',
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
}
