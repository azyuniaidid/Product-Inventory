@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h4 class="fw-bold mb-4">Admin Dashboard</h4>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <small class="text-muted fw-bold">TOTAL PRODUCTS</small>
                <h2 class="fw-bold mt-2 text-primary">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <small class="text-muted fw-bold">TOTAL STOCK</small>
                <h2 class="fw-bold mt-2 text-info">{{ $totalStock ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <small class="text-muted fw-bold">INVENTORY VALUE</small>
                <h2 class="fw-bold mt-2 text-success">RM {{ number_format($totalValue, 2) }}</h2>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4">
                <h6 class="fw-bold mb-3">Stock Levels by Category</h6>
                <canvas id="barChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4">
                <h6 class="fw-bold mb-3">Top 5 Products (Stock)</h6>
                <canvas id="pieChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // BAR CHART
    const barLabels = @json($stockByCategory->pluck('category'));
    const barData = @json($stockByCategory->pluck('total'));

    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: barLabels,
            datasets: [{
                label: 'Units in Stock',
                data: barData,
                backgroundColor: '#4b1fff'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // PIE CHART
    const pieLabels = @json($topProducts->pluck('name'));
    const pieData = @json($topProducts->pluck('available_stock'));

    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieData,
                backgroundColor: ['#4b1fff', '#7b2ff7', '#a55eea', '#45aaf2', '#2d98da']
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
</script>
@endsection