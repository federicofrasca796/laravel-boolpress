@extends('layouts.app')

@section('content')
    <!-- Nav tabs -->
    <div class="nav-item btn btn-light btn-md dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">Categories</a>
        <div class="dropdown-menu">
            @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ route('categories.posts', $category->id) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>





    <div class="row">
        @foreach ($posts as $post)
            {{-- {{ ddd($post->category) }} --}}
            <div class="col-3">
                <div class="card">
                    <img src="{{ $post->cover }}" alt="" class="car-img-top">
                    <div class="card-body">
                        <div class="card-body">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <p class="card-text">{{ $post->price }}</p>
                            <p class="card-text">Category:
                                {{ $post->category ? $post->category->name : 'none' }}
                            </p>
                            <p class="card-text text-end text-muted">
                                {{ strlen($post->body) > 50 ? substr($post->body, 0, 50) . '...' : $post->body }}</p>
                            <a href="{{ route('posts.show', $post->id) }}">View post</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
