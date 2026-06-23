<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'tb_customer';
    protected $primaryKey = 'Customer_Id';
    public $timestamps = false;
    protected $fillable = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Address',
        'Contact_No',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}
