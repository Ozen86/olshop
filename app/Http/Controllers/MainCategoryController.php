<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function storecat(Request $request){
        $validate_data = $request->validate([
            'çategory_name' => 'unique:categories|max:100',
        ]);

        Category::create($validate_data);
    }
}
