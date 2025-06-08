<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
       public function index(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.create', compact('allattributes'));
    }
    
    public function manage(){
        $allattributes = \App\Models\DefaultAttribute::all();
        return view('admin.product_attribute.manage', compact('allattributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute_value' => 'required|unique:default_attributes|max:100'
        ]);

        DefaultAttribute::create(['attribute_value' => $request->attribute_value]);

        return redirect()->back()->with('success', 'Attribute added successfully!');
    }

    public function createattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value' => 'required|unique:default_attributes|max:100'
        ]);

        \App\Models\DefaultAttribute::create($validate_data);

        return redirect()->back()->with('success', 'Default Attribute Added Successfully');
    }

    public function showattribute($id){
        $attribute = \App\Models\DefaultAttribute::findOrFail($id);
        return view('admin.product_attribute.edit', compact('attribute'));
    }

    public function updateattribute(Request $request, $id)
    {
        $attribute = \App\Models\DefaultAttribute::findOrFail($id);

        $request->validate([
            'attribute_value' => 'required|unique:default_attributes,attribute_value,' . $id . '|max:100'
        ]);

        $attribute->update([
            'attribute_value' => $request->attribute_value
        ]);

        return redirect()->route('productattribute.manage')->with('success', 'Attribute updated successfully!');
    }

    public function deleteattribute($id)
    {
        $attribute = \App\Models\DefaultAttribute::findOrFail($id);
        $attribute->delete();

        return redirect()->back()->with('success', 'Attribute deleted successfully!');
    }
}
