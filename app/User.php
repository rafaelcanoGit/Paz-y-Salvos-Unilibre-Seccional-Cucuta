<?php

namespace sisPazySalvos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use sisPazySalvos\Notifications\UserReestablecerPassword;


class User extends Authenticatable
{
    use Notifiable;

   protected $table ='usuarios';
   protected $primaryKey='id_usuario';
    protected $fillable = [ 'nombre', 'email', 'password','estado','id_rol'  ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserReestablecerPassword($token));
    }
    

    
}
