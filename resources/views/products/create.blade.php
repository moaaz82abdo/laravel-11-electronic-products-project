@extends('products.layouts')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add New Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>price:</strong></label>
            <input type="number"
                class="form-control @error('detail') is-invalid @enderror" 
                name="price" 
                id="inputDetail" 
                placeholder="Price"></input>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
         
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>stock_quantity:</strong></label>
            <input type="number"
                class="form-control @error('detail') is-invalid @enderror" 
                name="stock_quantity" 
                id="stock_quantity" 
                placeholder="stock_quantity"></input>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>category_id:</strong></label>
            <input 
                class="form-control @error('detail') is-invalid @enderror" 
                name="category_id" 
                id="inputDetail" 
                placeholder="category_id"></input>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection