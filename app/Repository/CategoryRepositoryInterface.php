<?php

namespace App\Repository;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory($category);
    public function updateCategory($categoryId,$category);
}
