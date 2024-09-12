
@extends('products.layouts')

@section('content')
    <div class="container">
        <h1>Low Stock Products</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowStockProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
