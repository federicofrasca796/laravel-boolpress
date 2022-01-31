@extends('layouts.app')

@section('content')

    <img src="{{ $post->cover }}" alt="" width="50%">
    <h1>{{ $post->title }}</h1>
    {{-- <span class="text-muted"><b>slug:</b><i>{{ $post->slug }}</i></span> --}}
    <div><b>Category:</b>{{ $post->category ? $post->category->name : 'none' }}</div>
    {{-- {{ dd($post->tags) }} --}}
    <div>
        <b>Tags:</b>
        @forelse ($post->tags as $tag)
            {{ $tag->name }}
            @if (!$loop->last)
                ,
            @endif
        @empty
            None
        @endforelse
    </div>
    <h2>{{ $post->sub_title }}</h2>
    <p>{{ $post->body }}</p>



@endsection
