<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Kelas;

class Mahasiswa extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mahasiswa';
    
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

    public function kelas(){
        return $this->belongsTo('App\Kelas');
    }
}
