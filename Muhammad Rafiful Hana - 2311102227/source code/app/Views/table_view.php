<?php $title = 'Data Table'; ?>
<?= view('layout/header', ['title' => $title, 'active_page' => 'table']) ?>

<div class="container py-4">
    <div class="animate-fade-in">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h2 class="glass-title">
                    <i class="fas fa-table me-2"></i>Product Data Table
                </h2>
                <p class="text-white-50 mb-0">Manage your inventory with CRUD operations</p>
            </div>
            <a href="/form" class="btn-gradient-glass">
                <i class="fas fa-plus me-2"></i> Add New Product
            </a>
        </div>
        
        <div class="glass-card p-4">
            <table id="productTable" class="table table-hover">
                <thead>
                    <tr class="text-white">
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price (Rp)</th>
                        <th>Stock</th>
                        <th>Total Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
let productTable;

$(document).ready(function() {
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
                        return '<span class="badge bg-warning text-dark px-3 py-2 rounded-pill">⚠️ ' + data + ' (Low)</span>';
                    }
                    return '<span class="badge bg-success px-3 py-2 rounded-pill">✓ ' + data + '</span>';
                }
            },
            { 
                data: null,
                render: function(data) {
                    let total = data.price * data.stock;
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
                }
            },
            {
                data: null,
                render: function(data) {
                    return `
                        <a href="/edit/${data.id}" class="btn btn-sm btn-glass me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-glass delete-btn" data-id="${data.id}">
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
                previous: "←",
                next: "→"
            }
        },
        order: [[0, 'desc']],
        responsive: true
    });
    
    // Delete handler
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
                        productTable.ajax.reload();
                    }
                });
            }
        });
    });
});
</script>

<?= view('layout/footer') ?>