@extends('admin.layouts.layout')
@section('admin_page_title')
Edit Attribute
@endsection
@section('admin_layout')
<form action="{{ route('update.attribute', $attribute->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="attribute_value">Attribute Value</label>
        <input type="text" class="form-control" name="attribute_value" value="{{ $attribute->attribute_value }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
