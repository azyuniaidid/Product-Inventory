@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h4 class="fw-bold mb-4">Inventory Overview</h4>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-0 bg-white">
                <small class="text-muted fw-bold">TOTAL PRODUCTS</small>
                <h2 class="fw-bold mt-2">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-0 bg-white">
                <small class="text-muted fw-bold">TOTAL VALUE</small>
                <h2 class="fw-bold mt-2">RM {{ number_format($totalValue ?? 0, 2) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection