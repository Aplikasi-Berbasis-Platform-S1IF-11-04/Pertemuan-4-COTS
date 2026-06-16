<?php $title = 'Form Input'; ?>
<?= view('layout/header', ['title' => $title, 'active_page' => 'form']) ?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 animate-fade-in">
            <div class="glass-card p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-box-open fa-3x text-white mb-3"></i>
                    <h2 class="glass-title"><?= isset($product) ? 'Edit Product' : 'Add New Product' ?></h2>
                    <p class="text-white-50">Fill in the product details below</p>
                </div>
                
                <form action="/save" method="POST">
                    <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">
                    
                    <div class="mb-3">
                        <label class="text-white fw-bold mb-2">
                            <i class="fas fa-tag me-1"></i> Product Name
                        </label>
                        <input type="text" name="product_name" class="form-control" 
                               value="<?= $product['product_name'] ?? '' ?>" 
                               placeholder="Enter product name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-white fw-bold mb-2">
                            <i class="fas fa-money-bill me-1"></i> Price (Rp)
                        </label>
                        <input type="number" name="price" class="form-control" 
                               value="<?= $product['price'] ?? '' ?>" 
                               placeholder="Enter price" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="text-white fw-bold mb-2">
                            <i class="fas fa-cubes me-1"></i> Stock
                        </label>
                        <input type="number" name="stock" class="form-control" 
                               value="<?= $product['stock'] ?? '' ?>" 
                               placeholder="Enter stock quantity" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-gradient-glass">
                            <i class="fas fa-save me-2"></i> <?= isset($product) ? 'Update Product' : 'Save Product' ?>
                        </button>
                        <a href="/table" class="btn-glass text-center">
                            <i class="fas fa-table me-2"></i> View All Products
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Info Card -->
            <div class="glass-card p-3 mt-4 text-center">
                <small class="text-white-50">
                    <i class="fas fa-info-circle me-1"></i> 
                    Fill all fields correctly. Stock below 10 will be marked as "Low Stock"
                </small>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>