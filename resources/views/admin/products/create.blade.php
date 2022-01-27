@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="Insert name">
            <small id="helpId" class="form-text text-muted">Max 200 characters</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Url</label>
            <input type="text" class="form-control" name="image" id="image" aria-describedby="helpId"
                placeholder="https://...">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                placeholder="107.35">
            <small id="helpId" class="form-text text-muted">Only euro currency</small>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                placeholder="lorem ipsum dolor sit amet">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Avaiable quantity</label>
            <input type="number" class="form-control" name="qty" id="qty" aria-describedby="helpId" placeholder="99">
            @error('qty')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
