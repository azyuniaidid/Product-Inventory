<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #f5f6fa; font-family: 'Segoe UI', sans-serif; }
        .sidebar { width: 240px; background: linear-gradient(180deg, #4b1fff, #7b2ff7); min-height: 100vh; color: white; position: fixed; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; display: block; padding: 15px 25px; }
        .content { margin-left: 240px; padding: 30px; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <div class="p-4 mb-3"><h4 class="fw-bold">IMS Admin</h4></div>
        <a href="/dashboard">Dashboard</a>
        <a href="/products">Product List</a>
        <a href="/">Logout</a>
    </div>
    <div class="content w-100">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>
</div>
</body>
</html>