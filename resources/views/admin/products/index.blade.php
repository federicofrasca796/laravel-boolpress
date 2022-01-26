@extends('layouts.admin')

@section('content')
    @foreach ($products as $product)
        <h2>Products</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach

@endsection
