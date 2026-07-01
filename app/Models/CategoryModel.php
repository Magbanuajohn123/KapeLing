<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

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

    // ✅ RELATIONSHIP (THIS IS WHAT YOU WERE MISSING)
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'Category_Id', 'Category_Id');
    }
}
