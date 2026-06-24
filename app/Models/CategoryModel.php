<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'tb_category';
    protected $primaryKey = 'Category_Id';

    public $timestamps = false;

    protected $fillable = [
        'Category_Name',
        'Description',
        'Category_Icon'
    ];
}
