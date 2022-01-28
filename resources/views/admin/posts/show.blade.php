@extends('layouts.admin')

@section('content')

    <img src="{{ $post->cover }}" alt="" width="50%">
    <h1>{{ $post->title }}</h1>
    <span class="text-muted"><b>slug:</b><i>{{ $post->slug }}</i></span>
    <div><b>Category:</b>{{ $post->category ? $post->category->name : 'none' }}</div>
    <h2>{{ $post->sub_title }}</h2>
    <p>{{ $post->body }}</p>



@endsection
