@extends('layouts.admin')

@section('content')
    <h1 class="text-capitalize">{{ $product->name }}</h1>
    <img width="300px" src="{{ $product->image }}" alt="">
    <h3>€{{ $product->price }} | Qty: {{ $product->qty }}</h3>
    <p>{{ $product->description }}</p>
@endsection
