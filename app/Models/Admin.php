<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'tb_admin';

    protected $fillable = [
        'Email',
        'Password'
    ];

    protected $hidden = [
        'Password',
    ];
}
