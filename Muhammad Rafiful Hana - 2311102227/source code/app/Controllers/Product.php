<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $products = $this->productModel->findAll();
        
        $totalProducts = count($products);
        $totalValue = 0;
        $lowStock = 0;
        
        foreach ($products as $p) {
            $totalValue += $p['price'] * $p['stock'];
            if ($p['stock'] < 10) {
                $lowStock++;
            }
        }
        
        $data = [
            'total_products' => $totalProducts,
            'total_value' => $totalValue,
            'low_stock' => $lowStock,
            'full_name' => session()->get('full_name'),
            'role' => session()->get('role')
        ];
        
        return view('dashboard_view', $data);
    }
    
    public function getData()
    {
        $data = $this->productModel->findAll();
        return $this->response->setJSON($data);
    }
    
    public function save()
    {
        // Debug: Log incoming request
        log_message('debug', 'Save method called');
        log_message('debug', 'POST data: ' . json_encode($this->request->getPost()));
        
        // Get input data
        $id = $this->request->getPost('id');
        $product_name = $this->request->getPost('product_name');
        $price = $this->request->getPost('price');
        $stock = $this->request->getPost('stock');
        
        // Validation
        $errors = [];
        if (empty($product_name)) {
            $errors[] = 'Product name is required';
        }
        if (empty($price) || $price <= 0) {
            $errors[] = 'Valid price is required';
        }
        if ($stock === '' || $stock === null) {
            $errors[] = 'Stock is required';
        }
        
        if (!empty($errors)) {
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => implode(', ', $errors)
            ]);
        }
        
        $data = [
            'product_name' => $product_name,
            'price' => floatval($price),
            'stock' => intval($stock),
            'created_by' => session()->get('user_id')
        ];
        
        try {
            if ($id && !empty($id)) {
                // Update
                $result = $this->productModel->update($id, $data);
                if ($result) {
                    return $this->response->setJSON([
                        'status' => 'updated', 
                        'message' => 'Product updated successfully'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error', 
                        'message' => 'Failed to update product: ' . json_encode($this->productModel->errors())
                    ]);
                }
            } else {
                // Insert
                $result = $this->productModel->insert($data);
                if ($result) {
                    return $this->response->setJSON([
                        'status' => 'saved', 
                        'message' => 'Product saved successfully'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error', 
                        'message' => 'Failed to save product: ' . json_encode($this->productModel->errors())
                    ]);
                }
            }
        } catch (\Exception $e) {
            log_message('error', 'Save product error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }
    
    public function delete($id)
    {
        try {
            $this->productModel->delete($id);
            return $this->response->setJSON([
                'status' => 'deleted', 
                'message' => 'Product deleted successfully'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Failed to delete product'
            ]);
        }
    }
    
    public function getChartData()
    {
        $products = $this->productModel->findAll();
        $labels = [];
        $stocks = [];
        
        foreach ($products as $p) {
            $labels[] = $p['product_name'];
            $stocks[] = (int)$p['stock'];
        }
        
        return $this->response->setJSON(['labels' => $labels, 'stocks' => $stocks]);
    }
}