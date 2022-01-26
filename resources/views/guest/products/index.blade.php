@extends('layouts.app')

@section('content')

    <div class="row">
        @foreach ($products as $product)
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="card-text">{{ $product->price }}</p>
                        <p class="card-text text-end">{{ $product->qty }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
