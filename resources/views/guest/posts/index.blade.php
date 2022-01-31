@extends('layouts.app')

@section('content')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs|pills" id="navId" role="tablist">
        <li class="nav-item btn btn-light btn-md dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">Tags</a>
            <div class="dropdown-menu">
                @foreach ($tags as $tag)
                    <a class="dropdown-item" href="{{ route('tags.posts', $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </li>
        <li class="nav-item btn btn-light btn-md dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">Categories</a>
            <div class="dropdown-menu">
                @foreach ($categories as $category)
                    <a class="dropdown-item"
                        href="{{ route('categories.posts', $category->id) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </li>

    </ul>


    <!-- Tab panes -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>

    <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
    <script>
        var triggerEl = document.querySelector('#navId a')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
    </script>






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
