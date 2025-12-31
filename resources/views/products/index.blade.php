@extends('layouts.admin')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Product Inventory List</h4>
        <a href="/products/create" class="btn btn-primary" style="background: #4b1fff; border:none;">+ Add Product</a>
    </div>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>#{{ $product->product_id }}</td>
                <td class="fw-bold">{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>RM {{ number_format($product->price, 2) }}</td>
                <td>{{ $product->available_stock }}</td>
                <td>
                    <a href="/products/{{ $product->product_id }}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="/products/{{ $product->product_id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    {{-- We add the onclick attribute here to trigger the popup --}}
    <button type="submit" class="btn btn-sm btn-outline-danger" 
            onclick="return confirm('Are you sure you want to permanently delete this product ({{ $product->name }})?')">
        Delete
    </button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection