@extends('customer.layouts.layout')
@section('customer_page_title')
Dashboard - Customer Panel
@endsection
@section('customer_layout')
    <h3>Kuda Terbang</h3>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
@endsection