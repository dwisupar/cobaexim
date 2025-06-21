{{-- resources/views/products/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Produk</h2>
    </x-slot>

    <div class="container">
        <h2>Product List</h2>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3">+ Add Product</a>

        <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">Import Excel</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('products.export') }}" class="btn btn-success">Export Excel</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>{{ $p->price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>