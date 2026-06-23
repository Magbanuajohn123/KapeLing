<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'tb_admin';
    protected $primaryKey = 'Admin_Id';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password'
    ];

    protected $hidden = [
        'Password',
    ];
}
