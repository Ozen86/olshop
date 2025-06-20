@extends('admin.layouts.layout')
@section('admin_page_title')
Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage Category</h5> <!-- Perbaikan typo 'tittle' ke 'title' -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->category_name }}</td>
                                <td>
                                    <div class="d-flex gap-2"> <!-- Tambahkan flex container dengan gap -->
                                        <a href="{{ route('show.cat', $cat->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('delete.cat', $cat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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