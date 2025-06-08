@extends('admin.layouts.layout')
@section('admin_page_title')
Admin Panel
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Default Attribute</h5>
            </div>
            <div class="card-body">
                {{-- Tampilkan pesan sukses dengan auto-hide --}}
                @if(session('success'))
                    <div class="alert alert-success" role="alert" id="success-alert" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16" style="vertical-align: text-bottom;">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.061L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('admin.productattribute.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="attribute_value" class="form-label fw-bold">Give Name For Your Attribute</label>
                        <input type="text" class="form-control @error('attribute_value') is-invalid @enderror" 
                               name="attribute_value" id="attribute_value" 
                               placeholder="Insert Attribute" 
                               value="{{ old('attribute_value') }}">
                        @error('attribute_value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Add Attribute</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk auto-hide success message --}}
@if(session('success'))
<script>
    // Auto-hide success alert after 3 seconds
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.remove();
            }, 500);
        }
    }, 3000); // 3000ms = 3 seconds
</script>
@endif
@endsection