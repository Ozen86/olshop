@extends('admin.layouts.layout')

@section('admin_page_title')
Admin Panel
@endsection

@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit SubCategory</h5> {{-- Ubah dari Create ke Edit --}}
            </div>
            <div class="card-body">
                {{-- Tampilkan pesan sukses --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.061L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form action="{{ route('update.subcat', $subcategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- 🔧 Perubahan 1: Ubah name dan id agar sesuai dengan validasi --}}
                    <div class="mb-3">
                        <label for="subcategory_name" class="form-label fw-bold">SubCategory Name</label> {{-- 🔧 id & for disesuaikan --}}
                        <input type="text"
                               class="form-control @error('subcategory_name') is-invalid @enderror"
                               name="subcategory_name" id="subcategory_name" {{-- 🔧 name diperbaiki --}}
                               value="{{ old('subcategory_name', $subcategory->subcategory_name) }}">
                        @error('subcategory_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- 🔧 Perubahan 2: Tambahkan dropdown kategori agar bisa diedit --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-bold">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror"
                                name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update SubCategory</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk auto-hide alert --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert.alert-success');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        }

        const closeButtons = document.querySelectorAll('[data-bs-dismiss="alert"]');
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const alert = this.closest('.alert');
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        });
    });
</script>
@endsection
