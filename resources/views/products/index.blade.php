@extends('layouts.layout')

@section('content')

    @include('products.list')

    <div style="padding: 10px;">
    </div>

    @include('products.form')

@endsection
