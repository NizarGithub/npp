<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'last_login', 'first_name', 'last_name', 'dob', 'gender', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['dob'];

    public function activation()
    {
        return $this->hasOne('App\Models\Activation');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}