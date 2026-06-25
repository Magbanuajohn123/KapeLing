<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function product()
    {
        $categories = CategoryModel::all();
        $products = ProductModel::with('category')->get();
        return view('adminProduct', compact('categories','products'));
    }
    public function addProduct(Request $request)
    {
        try {
            $product = $request->validate([
                'Product_Name' => 'required|string|unique:tb_product,Product_Name',
                'Category_Id' => 'required|exists:tb_category,Category_Id',
                'Product_Image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $imagePath = null;

            if ($request->hasFile('Product_Image')) {
                $imagePath = $request->file('Product_Image')->store('products', 'public');
            }
            ProductModel::create([
                'Product_Name' => $product['Product_Name'],
                'Category_Id' => $product['Category_Id'],
                'Product_Image' => $imagePath,
            ]);
            return back()->with('success', 'Add Product Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
