<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'price', 'stock', 'created_by'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $useSoftDeletes = false;
    protected $returnType = 'array';
    
    // Validation rules
    protected $validationRules = [
        'product_name' => 'required|min_length[3]|max_length[255]',
        'price' => 'required|numeric|greater_than[0]',
        'stock' => 'required|integer|greater_than_equal_to[0]'
    ];
    
    protected $validationMessages = [
        'product_name' => [
            'required' => 'Product name is required',
            'min_length' => 'Product name must be at least 3 characters'
        ],
        'price' => [
            'required' => 'Price is required',
            'numeric' => 'Price must be a number',
            'greater_than' => 'Price must be greater than 0'
        ],
        'stock' => [
            'required' => 'Stock is required',
            'integer' => 'Stock must be a whole number',
            'greater_than_equal_to' => 'Stock cannot be negative'
        ]
    ];


    public function getTotalProducts()
    {
        return $this->countAll();
    }

    public function getTotalValue()
    {
        // Perbaikan query untuk menghitung total nilai inventory
        $query = $this->select('SUM(price * stock) as total_value')->get();
        $result = $query->getRow();
        return $result->total_value ?? 0;
    }

    public function getLowStock($threshold = 10)
    {
        return $this->where('stock <', $threshold)->countAllResults();
    }
}