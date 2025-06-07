@extends('admin.layouts.layout')
@section('admin_page_title')
Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage SubCategory</h5> <!-- Perbaikan typo 'tittle' ke 'title' -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SubCategory</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subcat->subcategory_name }}</td>
                                <td>{{ $subcat->category->category_name }}</td>
                                <td>
                                    <div class="d-flex gap-2"> <!-- Tambahkan flex container dengan gap -->
                                        <a href="" class="btn btn-secondary">Edit</a>
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>     
            </div>
        </div>
    </div>
</div>
@endsection