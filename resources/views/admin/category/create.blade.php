@extends('admin.layouts.layout')
@section('admin_page_title')
Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card tittle mb-0">Create Category</h5>
            </div>
            <div class="card-body">
                <form action="{{route('store.cat')}}" method="POST">
                @csrf
                <label for="category_name" class="fw-bold mb-2">Give Name For Your Category</label>
                <input type="text" class="form-control mb-2"  name="category_name" id="category_name" placeholder="Insert Category Name">
                 @error('category_name')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
                <button type="sumbit" class="btn btn-primary w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection