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
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="My wonderful day" value="{{ $post->title }}">
            <small id="helpId" class="form-text text-muted">max 200 characters</small>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categories</label>
            <select class="form-select" name="category_id" id="category_id">
                <option value="">No category</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $cat->id == old('category', $post->category_id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple class="form-select" name="tags[]" id="tags">
                {{-- <option value=""> </option> --}}

                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="form-label">Post cover</div>
            {{-- <div class="col-6">
                <label for="cover_url" class="form-label">URL</label>
                <input type="text" class="form-control" name="cover_url" id="cover_url" aria-describedby="helpId"
                    placeholder="https://..." value="{{ $post->cover }}">
            </div> --}}
            <div class="col-6">
                <label for="cover_file" class="form-label">From file</label>
                <input type="file" class="form-control" name="cover_file" id="cover_file" aria-describedby="helpId"
                    placeholder="https://...">
            </div>
        </div>

        <div class=" mb-3">
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
