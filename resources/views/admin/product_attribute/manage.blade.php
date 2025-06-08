@extends('admin.layouts.layout')
@section('admin_page_title')
Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Manage Attribute</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Attribute Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allattributes as $attribute)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attribute->attribute_value }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('show.attribute', $attribute->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('delete.attribute', $attribute->id) }}" method="POST" class="d-inline">
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
