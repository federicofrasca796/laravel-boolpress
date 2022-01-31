@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category:{{ $tag->name }}</h1>
        <p>All posts in "{{ $tag->name }}" category</p>

        <div class="row">
            @forelse ($posts as $post)
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
                                <p class="card-text">Tags:
                                    {{-- {{ ddd($post->tags) }} --}}
                                    {{-- {{ $post->tags ? $post->tags->name : 'none' }} --}}
                                    @forelse ($post->tags as $tag)
                                        {{-- {{ ddd($tag) }} --}}
                                        {{ $tag->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @empty
                                        No posts found with this tag
                                    @endforelse
                                </p>
                                <p class="card-text text-end text-muted">
                                    {{ strlen($post->body) > 50 ? substr($post->body, 0, 50) . '...' : $post->body }}</p>
                                <a href="{{ route('posts.show', $post->id) }}">View post</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <em>Nothing to see here</em>
            @endforelse
        </div>

    </div>


@endsection
