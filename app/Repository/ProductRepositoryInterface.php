<?php

namespace App\Repository;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getFilterProducts($name,$description,$is_home,$is_active,$price_min,$price_max,$order_by,$order_status);
    public function getProductsByCategory($categoryId);
    public function getProductById($productId);
    public function deleteProduct($productId);
    public function createProduct($product);
    public function updateProduct($productId,$product);
}
