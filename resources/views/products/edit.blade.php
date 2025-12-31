@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-5 shadow-sm">
            <div class="d-flex align-items-center mb-4">
                <a href="/products" class="btn btn-sm btn-light me-3">←</a>
                <h4 class="fw-bold mb-0">Edit Product: {{ $product->product_id }}</h4>
            </div>
            <hr class="mb-4">

            <form action="/products/{{ $product->product_id }}" method="POST" onsubmit="return confirm('Confirm changes for this product?')">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Product ID</label>
                        <input type="text" name="product_id" class="form-control bg-light" value="{{ $product->product_id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Price (RM)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">Available Stock</label>
                    <input type="number" name="available_stock" class="form-control" value="{{ $product->available_stock }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-5" style="background: #4b1fff; border:none;">Update Product</button>
                    <a href="/products" class="btn btn-outline-secondary px-5">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection