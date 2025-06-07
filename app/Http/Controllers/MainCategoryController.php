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

    public function updatecat(Request $request, $id){
        $category = Category::findOrFail($id);
        $validate_data = $request->validate([
        // Add exception for current record
        'category_name' => 'required|unique:categories,category_name,'.$id.'|max:100',
    ]);

        $category->update($validate_data);
    
        return redirect()->route('category.manage')->with('success', 'Category updated successfully!');
    }

    public function manage()
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }

    public function deletecat(Request $request, $id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}