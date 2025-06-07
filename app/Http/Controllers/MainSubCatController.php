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
        return view('admin.subcategory.create', compact('categories'));
    }

    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:100',
            'category_id' => 'required|exist:categories, id'
        ]);

        SubCategory::create($validate_data);

        return redirect()->back()->with('success', 'SubCategory Added Successfully');
    }

}

