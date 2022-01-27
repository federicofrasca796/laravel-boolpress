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

                            {{-- <!-- Button trigger modal -->
                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#post_delete_{{ $post->id }}">
                                <i class="fas fa-trash-alt link-danger"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="#post_delete_{{ $post->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="#post_delete_{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete "{{ $post->title }}" ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confirm? This action is irreversible.
                                        </div>
                                        <div class="modal-footer"> --}}
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>
                            {{-- </div> --}}
    </div>
    </div>
    </div>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>

@endsection
