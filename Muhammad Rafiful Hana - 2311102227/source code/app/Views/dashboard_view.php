<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HansInventory | Modern Inventory Management</title>
    
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated gradient background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, 
                rgba(102, 126, 234, 0.3) 0%, 
                rgba(118, 75, 162, 0.3) 50%,
                rgba(255, 255, 255, 0.1) 100%);
            pointer-events: none;
            z-index: -1;
        }
        
        /* Navbar Glassmorphism */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* Glassmorphism effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            transition: all 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 40px 0 rgba(31, 38, 135, 0.5);
        }
        
        /* Stat card with neumorphism */
        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover .stat-icon {
            transform: rotate(5deg) scale(1.1);
        }
        
        /* Animation for stat cards when updated */
        @keyframes statPulse {
            0% {
                transform: scale(1);
                background: rgba(255, 255, 255, 0.15);
            }
            50% {
                transform: scale(1.02);
                background: rgba(255, 255, 255, 0.35);
                box-shadow: 0 10px 40px 0 rgba(31, 38, 135, 0.5);
            }
            100% {
                transform: scale(1);
                background: rgba(255, 255, 255, 0.15);
            }
        }
        
        .stat-updated {
            animation: statPulse 0.5s ease-in-out;
        }
        
        /* Table styling - TEKS HITAM */
        .data-table-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .table {
            color: #000000 !important;
            margin-bottom: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white !important;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            padding: 15px;
        }
        
        .table tbody td {
            color: #000000 !important;
            padding: 12px 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9);
        }
        
        .table tbody tr:hover td {
            background: rgba(102, 126, 234, 0.1);
            color: #000000 !important;
        }
        
        /* Button styling */
        .btn-glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 12px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-gradient-glass {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 12px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-gradient-glass:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: white;
            border-radius: 12px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 87, 108, 0.4);
            color: white;
        }
        
        /* Modal glassmorphism */
        .modal-content {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #333;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 25px 25px 0 0;
            border: none;
        }
        
        /* DataTables customization */
        .dataTables_wrapper .dataTables_filter input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            color: #000;
            padding: 8px 15px;
        }
        
        .dataTables_wrapper .dataTables_filter input::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }
        
        .dataTables_wrapper .dataTables_length select {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            color: #000;
            padding: 5px;
        }
        
        .dataTables_wrapper .dataTables_info {
            color: white;
        }
        
        .dataTables_wrapper .dataTables_paginate {
            color: white;
        }
        
        .paginate_button {
            background: rgba(255, 255, 255, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 10px !important;
            color: white !important;
            margin: 0 3px !important;
        }
        
        .paginate_button.current {
            background: rgba(102, 126, 234, 0.8) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            color: white !important;
        }
        
        /* Form controls */
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        /* Badge styling */
        .badge-low {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
        }
        
        .badge-normal {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
        }
        
        /* Title styling */
        .glass-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff, rgba(255,255,255,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        /* User info text */
        .user-info {
            color: #333;
            font-weight: 500;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Number counter animation */
        .stat-number {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Navbar Glassmorphism dengan Tombol Logout -->
    <nav class="navbar navbar-glass sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-boxes me-2" style="color: #667eea;"></i>
                <span style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">HansInventory</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <div class="user-info">
                    <i class="fas fa-user-circle me-1" style="color: #667eea;"></i>
                    <span class="fw-bold"><?= $full_name ?></span>
                    <span class="badge bg-secondary ms-1"><?= ucfirst($role) ?></span>
                </div>
                <button class="btn-logout" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </div>
        </div>
    </nav>
    
    <div class="container py-4">
        <!-- Header -->
        <div class="text-center mb-5 animate-fade-in">
            <h1 class="glass-title">
                <i class="fas fa-cube me-3"></i>Dashboard
            </h1>
            <p class="text-white-50" style="font-weight: 300;">Welcome back, <?= $full_name ?>! Here's your inventory overview</p>
        </div>
        
        <!-- Stat Cards -->
        <div class="row mb-4 g-4 animate-fade-in" style="animation-delay: 0.1s;">
            <div class="col-md-4">
                <div class="stat-card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-white-50 mb-1" style="font-weight: 500;">Total Products</p>
                            <h2 class="text-white fw-bold mb-0 stat-number" id="totalProducts"><?= $total_products ?></h2>
                        </div>
                        <div class="stat-icon text-white">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-white-50 mb-1" style="font-weight: 500;">Inventory Value</p>
                            <h2 class="text-white fw-bold mb-0 stat-number" id="inventoryValue">Rp <?= number_format($total_value, 0, ',', '.') ?></h2>
                        </div>
                        <div class="stat-icon text-white">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-white-50 mb-1" style="font-weight: 500;">Low Stock Alert</p>
                            <h2 class="text-white fw-bold mb-0 stat-number" id="lowStockCount"><?= $low_stock ?></h2>
                        </div>
                        <div class="stat-icon text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chart & Table Section -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="glass-card p-4">
                    <h5 class="text-white fw-bold mb-3">
                        <i class="fas fa-chart-bar me-2"></i>Stock Distribution
                    </h5>
                    <canvas id="stockChart" height="280"></canvas>
                </div>
            </div>
            <div class="col-lg-8 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="data-table-wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h5 class="fw-bold mb-0" style="color: #333;">
                            <i class="fas fa-table me-2" style="color: #667eea;"></i>Product List
                        </h5>
                        <div class="d-flex gap-2">
                            <button class="btn-glass" onclick="exportToExcel()">
                                <i class="fas fa-file-excel me-1"></i> Excel
                            </button>
                            <button class="btn-gradient-glass" data-bs-toggle="modal" data-bs-target="#productModal" onclick="resetForm()">
                                <i class="fas fa-plus me-1"></i> Add Product
                            </button>
                        </div>
                    </div>
                    <table id="productTable" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Price (Rp)</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Glassmorphism Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-box me-2"></i>Product Form
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="productForm">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Price (Rp)</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter stock quantity" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn-gradient-glass">
                                <i class="fas fa-save me-2"></i>Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
    
    <script>
    let productTable;
    let stockChart;
    
    $(document).ready(function() {
        // Initialize DataTable
        productTable = $('#productTable').DataTable({
            ajax: {
                url: '/get-data',
                type: 'GET',
                dataSrc: ''
            },
            columns: [
                { data: 'id' },
                { data: 'product_name' },
                { 
                    data: 'price',
                    render: function(data) {
                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                { 
                    data: 'stock',
                    render: function(data) {
                        if(data < 10) {
                            return '<span class="badge-low text-nowrap"><i class="fas fa-exclamation-circle me-1"></i>' + data + ' (Low)</span>';
                        }
                        return '<span class="badge-normal text-nowrap"><i class="fas fa-check-circle me-1"></i>' + data + '</span>';
                    }
                },
                {
                    data: null,
                    render: function(data) {
                        return `
                            <button class="btn btn-sm btn-primary edit-btn" data-id="${data.id}" data-name="${data.product_name}" data-price="${data.price}" data-stock="${data.stock}" style="margin-right: 5px; background: #667eea; border: none;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${data.id}" style="background: #f5576c; border: none;">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        `;
                    }
                }
            ],
            language: {
                search: "🔍 Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    previous: "<",
                    next: ">"
                }
            },
            order: [[0, 'desc']],
            responsive: true
        });
        
        // Load initial chart and stats
        loadChart();
        updateAllStats(); // Initial stats load
        
        // Form submit - CREATE & UPDATE
        $('#productForm').on('submit', function(e) {
            e.preventDefault();
            
            // Client-side validation
            let productName = $('#product_name').val().trim();
            let price = $('#price').val();
            let stock = $('#stock').val();
            
            if (productName === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Product name is required!',
                    background: 'rgba(255, 255, 255, 0.95)'
                });
                return false;
            }
            
            if (price === '' || parseFloat(price) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Valid price is required!',
                    background: 'rgba(255, 255, 255, 0.95)'
                });
                return false;
            }
            
            if (stock === '' || parseInt(stock) < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Valid stock quantity is required!',
                    background: 'rgba(255, 255, 255, 0.95)'
                });
                return false;
            }
            
            // Show loading
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            $.ajax({
                url: '/save',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'saved' || response.status === 'updated') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false,
                            background: 'rgba(255, 255, 255, 0.95)'
                        });
                        $('#productModal').modal('hide');
                        
                        // REAL-TIME UPDATE: Refresh semua data
                        productTable.ajax.reload();      // Refresh tabel
                        loadChart();                      // Refresh chart
                        updateAllStats();                 // Refresh statistik (Total, Value, Low Stock)
                        resetForm();                      // Reset form
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Failed to save product',
                            background: 'rgba(255, 255, 255, 0.95)'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to save product. Please try again.',
                        background: 'rgba(255, 255, 255, 0.95)'
                    });
                }
            });
        });
        
        // Edit button - Populate form
        $(document).on('click', '.edit-btn', function() {
            $('#id').val($(this).data('id'));
            $('#product_name').val($(this).data('name'));
            $('#price').val($(this).data('price'));
            $('#stock').val($(this).data('stock'));
            $('#productModal').modal('show');
        });
        
        // Delete button - DELETE product
        $(document).on('click', '.delete-btn', function() {
            let id = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                background: 'rgba(255, 255, 255, 0.95)'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleting...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    $.ajax({
                        url: '/delete/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                            
                            // REAL-TIME UPDATE: Refresh semua data
                            productTable.ajax.reload();      // Refresh tabel
                            loadChart();                      // Refresh chart
                            updateAllStats();                 // Refresh statistik (Total, Value, Low Stock)
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to delete product',
                                background: 'rgba(255, 255, 255, 0.95)'
                            });
                        }
                    });
                }
            });
        });
    });
    
    // Function to load chart
    function loadChart() {
        $.ajax({
            url: '/chart-data',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(stockChart) {
                    stockChart.destroy();
                }
                const ctx = document.getElementById('stockChart').getContext('2d');
                stockChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Stock Quantity',
                            data: data.stocks,
                            backgroundColor: 'rgba(255, 255, 255, 0.7)',
                            borderColor: 'rgba(255, 255, 255, 1)',
                            borderWidth: 2,
                            borderRadius: 10,
                            barPercentage: 0.6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                labels: {
                                    color: 'white',
                                    font: {
                                        family: 'Poppins',
                                        size: 12
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: 'white'
                                }
                            },
                            x: {
                                ticks: {
                                    color: 'white',
                                    maxRotation: 45,
                                    minRotation: 45
                                }
                            }
                        }
                    }
                });
            },
            error: function() {
                console.log('Failed to load chart data');
            }
        });
    }
    
    // Function to update ALL statistics in real-time
    function updateAllStats() {
        $.ajax({
            url: '/get-data',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // 1. Update Total Products
                let totalProducts = data.length;
                $('#totalProducts').text(totalProducts);
                
                // 2. Calculate Total Inventory Value and Low Stock
                let totalValue = 0;
                let lowStock = 0;
                
                data.forEach(item => {
                    totalValue += item.price * item.stock;
                    if(item.stock < 10) {
                        lowStock++;
                    }
                });
                
                // 3. Update Inventory Value with formatted currency
                let formattedValue = new Intl.NumberFormat('id-ID').format(totalValue);
                $('#inventoryValue').text('Rp ' + formattedValue);
                
                // 4. Update Low Stock Count
                $('#lowStockCount').text(lowStock);
                
                // 5. Add animation effect to all stat cards
                animateStatCards();
                
                console.log('Stats updated - Total Products: ' + totalProducts + 
                           ', Inventory Value: Rp ' + formattedValue + 
                           ', Low Stock: ' + lowStock);
            },
            error: function() {
                console.log('Failed to update statistics');
            }
        });
    }
    
    // Function to add animation effect on stat cards when updated
    function animateStatCards() {
        $('.stat-card').addClass('stat-updated');
        setTimeout(() => {
            $('.stat-card').removeClass('stat-updated');
        }, 300);
    }
    
    // Function to export to Excel
    function exportToExcel() {
        let tableData = [];
        $('#productTable tbody tr').each(function() {
            let row = [];
            $(this).find('td').each(function(index) {
                if(index < 4) {
                    let text = $(this).text().replace('(Low)', '').trim();
                    row.push(text);
                }
            });
            if(row.length) tableData.push(row);
        });
        
        let ws = XLSX.utils.aoa_to_sheet([['ID', 'Product Name', 'Price', 'Stock'], ...tableData]);
        let wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Products');
        XLSX.writeFile(wb, `glass_inventory_${new Date().toISOString().split('T')[0]}.xlsx`);
        
        Swal.fire({
            icon: 'success',
            title: 'Exported!',
            text: 'Excel file has been downloaded',
            timer: 1500,
            showConfirmButton: false,
            background: 'rgba(255, 255, 255, 0.95)'
        });
    }
    
    // Function to reset form
    function resetForm() {
        $('#productForm')[0].reset();
        $('#id').val('');
    }
    
    // Function to confirm logout
    function confirmLogout() {
        Swal.fire({
            title: 'Logout Confirmation',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Logout',
            cancelButtonText: 'Cancel',
            background: 'rgba(255, 255, 255, 0.95)'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/logout';
            }
        });
    }
    
    // Auto refresh stats every 10 seconds (for multi-user scenario)
    let autoRefreshInterval = setInterval(function() {
        if (document.visibilityState === 'visible') {
            updateAllStats();
            loadChart();
        }
    }, 10000);
    
    // Cleanup interval on page unload
    $(window).on('beforeunload', function() {
        clearInterval(autoRefreshInterval);
    });
    </script>
</body>
</html>