@extends('layouts.admin')

@section('content')
    <h2>Blog Posts</h2>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">New Post</a>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Title</th>
                    <th scope="col">Subtitle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td width="80px"><img class="w-100" src="{{ $post->cover }}" alt=""></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->sub_title }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="link-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="link-secondary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.posts.destroy', $post->id) }}" class="link-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
