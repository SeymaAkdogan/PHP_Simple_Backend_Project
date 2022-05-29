<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->products()->detach();
        Category::destroy($categoryId);
    }

    public function createCategory($category)
    {
        return Category::create($category);
    }

    public function updateCategory($categoryId,$category)
    {
        return Category::whereId($categoryId)->update($category);
    }
}
