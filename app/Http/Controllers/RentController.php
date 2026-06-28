<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductModel;

class RentController extends Controller
{
    public function itemView(){
        $products = ProductModel::with('category')->get();
        return view('userRent',compact('products'));
    }
    public function productView($id){
        $product = ProductModel::findOrFail($id);
        return view('userProduct',compact('product'));
    }
}
