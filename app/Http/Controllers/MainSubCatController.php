<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory; // Add this import
use App\Models\Category;
use Illuminate\Validation\Rules\Unique;

class MainSubCatController extends Controller
{

    
    public function index()
    {
        $categories = Category::all();
        return view('admin.sub_category.create', compact('categories'));
    }

    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'required|unique:sub_categories|max:100',
            'category_id' => 'required|exists:categories,id' // ← spasi dihapus
        ]);

        SubCategory::create($validate_data);

        return redirect()->back()->with('success', 'SubCategory Added Successfully');
    }

    public function showsubcat($id){
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all(); // Tambah ini agar dropdown kategori bisa tampil
        return view('admin.sub_category.edit', compact('subcategory', 'categories'));
    }

    public function updatesubcat(Request $request, $id){
        $subcategory = SubCategory::findOrFail($id);
        $validate_data = $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$id.'|max:100',
            'category_id' => 'required|exists:categories,id' // ← spasi dihapus
        ]);

        $subcategory->update($validate_data);

        return redirect()->route('admin.subcategory.manage')->with('success', 'SubCategory updated successfully!');
    }

    public function manage()
    {
        $subcategories = SubCategory::all();
        return view('admin.sub_category.manage', compact('subcategories'));
    }

    public function deletesubcat(Request $request, $id){
        SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'SubCategory deleted successfully!');
    }
}

