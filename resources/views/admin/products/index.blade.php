@extends('layouts.admin')

@section('content')
    <h2>Products</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">New Product</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td width="80px"><img class="w-100" src="{{ $product->image }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>€{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="link-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="link-secondary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{ route('admin.products.destroy', $product->id) }}" class="link-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
