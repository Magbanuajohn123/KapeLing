<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'tb_product';

    protected $primaryKey = 'Product_Id';

    public $timestamps = false;

    protected $fillable = [
        'Product_Name',
        'Category_Id',
        'Product_Price',
        'Product_Image',
    ];

    public function category()
    {
        return $this->belongsTo(
            CategoryModel::class,#model for creating category
            'Category_Id',#Foreign Key
            'Category_Id'#Primary Key
        );
    }
}
