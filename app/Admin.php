<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    //
    
        use Notifiable;
        protected $table="admins";
        protected $guard = 'member';

        protected $fillable = [
            'name', 'email', 'password', 'is_member'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
        protected $casts = [
        'email_verified_at' => 'datetime',
    	];
        public function sendPasswordResetNotification($token)
        {
        $this->notify(new AdminResetPasswordNotification($token));
        }
}
