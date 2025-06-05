@extends('admin.layouts.layout')
@section('admin_page_title')
Dashboard - Admin Panel
@endsection
@section('admin_layout')
    <h3>Kuda Terbang</h3>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
@endsection