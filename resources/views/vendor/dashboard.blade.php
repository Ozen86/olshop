@extends('vendor.layouts.layout')
@section('vendor_page_title')
Dashboard - Vendor Panel
@endsection
@section('vendor_layout')
    <h3>Vendor Kuda</h3>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
@endsection