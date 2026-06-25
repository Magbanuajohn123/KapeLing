<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Supports\Facades\Log;

class CategoryController extends Controller
{
    public function category()
    {
        if (!Auth::guard('admin')->check()) {
        return redirect('/login');
    }
        $category = CategoryModel::all();
        return view('adminCategory', compact('category'));
    }
    public function addCategory(Request $request)
    {
        try {
            $category = $request->validate([
                'Category_Name' => 'required|string|unique:tb_category,Category_Name',
                'Description' => 'required|string',
                'Category_Icon' => 'required',
            ]);
            CategoryModel::create([
                'Category_Name' => $category['Category_Name'],
                'Description' => $category['Description'],
                'Category_Icon' => $category['Category_Icon'],
            ]);
            return back()->with('success', 'Added Category');
        } catch (\Throwable $th) {

            return back()->with('error', $th->getMessage());
        }
    }
    public function deleteCategory($id){
        try {
            $category = CategoryModel::findOrFail($id);
            $category->delete();
            return back()->with('success', 'Category deleted successfully');
        } catch (\Throwable $th) {
             return back()->with('error', $th->getMessage());
        }
    }
    public function updateCategory(Request $request, $id)
{
    $category = CategoryModel::findOrFail($id);

    $category->update([
        'Category_Name' => $request->Category_Name,
        'Description' => $request->Description,
        'Category_Icon' => $request->Category_Icon,
    ]);

    return back()->with('success', 'Category updated successfully');
}
}
