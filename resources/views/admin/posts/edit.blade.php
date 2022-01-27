@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cover" class="form-label">Post cover</label>
            <input type="text" class="form-control" name="cover" id="cover" aria-describedby="helpId"
                placeholder="https://..." value="{{ $post->cover }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="My wonderful day" value="{{ $post->title }}">
            <small id="helpId" class="form-text text-muted">max 200 characters</small>
        </div>

        <div class="mb-3">
            <label for="sub_title" class="form-label">Subtitle</label>
            <input type="text" class="form-control" name="sub_title" id="sub_title" aria-describedby="helpId"
                placeholder="" value="{{ $post->sub_title }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body of text</label>
            <textarea class="form-control" name="body" id="body" rows="3">{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save post</button>
    </form>

@endsection
