@extends('layouts.app')

@section('content')

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3">
                <div class="card">
                    <img src="{{ $post->cover }}" alt="" class="car-img-top">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ $post->price }}</p>
                        <p class="card-text text-end">{{ $post->qty }}</p>
                        <a href="{{ }}">View post</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
