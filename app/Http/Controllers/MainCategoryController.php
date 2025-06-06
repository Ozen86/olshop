<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function storecat(Request $request){
        $validate_data = $request->validate([
            'category_name' => 'required|unique:categories|max:100'
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function showcat($id){
        $category_info = Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }
}