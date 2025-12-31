@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-5 shadow-sm">
            <h4 class="fw-bold mb-4">Create New Product</h4>
            <hr class="mb-4">

            <form action="/products" method="POST" onsubmit="return confirm('Are you ready to add this new product to the inventory?')">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Product ID</label>
                        <input type="text" name="product_id" class="form-control" placeholder="e.g. 001" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="e.g. Lips" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Price (RM)</label>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold">Available Stock</label>
                    <input type="number" name="available_stock" class="form-control" placeholder="0" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-5" style="background: #4b1fff; border:none;">Save Product</button>
                    <a href="/products" class="btn btn-outline-secondary px-5">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection