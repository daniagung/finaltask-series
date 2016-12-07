<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminAkademik extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = "adminakademik";
    protected $table = 'admin_akademik';

    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
