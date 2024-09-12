@extends('products.layouts')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        <a href="" class="btn btn-warning">Low Stock Products</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Quantity </th>
                    <th> <a href="{{ route('products.index', ['sort' => 'category_id', 'direction' => $sortField === 'category_id' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                        Category {{ $sortField === 'category_id' ? ($sortDirection === 'asc' ? '↑' : '↓') : '' }}
                    </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
