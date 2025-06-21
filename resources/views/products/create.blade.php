@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Product</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" class="form-control" name="price" step="0.01" value="{{ old('price') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection