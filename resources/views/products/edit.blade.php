@extends('products.layouts')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $product->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Price:</strong></label>
            <input 
                type="number" 
                name="price" 
                class="form-control @error('price') is-invalid @enderror" 
                id="inputName" 
                placeholder="price">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>stock_quantity:</strong></label>
            <input 
                type="number" 
                name="stock_quantity" 
                class="form-control @error('stock_quantity') is-invalid @enderror" 
                id="inputName" 
                placeholder="stock_quantity">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>category_id:</strong></label>
            <input 
                type="text" 
                name="category_id" 
                 
                class="form-control @error('category_id') is-invalid @enderror" 
                id="inputName" 
                placeholder="category_id">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
      
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection