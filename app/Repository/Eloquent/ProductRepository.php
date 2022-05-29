<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts()
    {
        return Product::with('categories')->get();
    }

    public function getFilterProducts($name,$description,$is_home,$is_active,$price_min,$price_max,$order_by,$order_status)
    {
        $products = Product::with('categories')->where('name', 'LIKE', '%'.$name.'%')
            ->where('description', 'LIKE', '%'.$description.'%')
            ->where('is_home', 'LIKE', '%'.$is_home.'%')
            ->where('is_active', 'LIKE', '%'.$is_active.'%');

        if($price_max != null && $price_min != null){
            $price_max=(float)$price_max;
            $price_min=(float)$price_min;
            $products=$products->where('price','<',$price_max)->where('price','>',$price_min);
        }elseif($price_max != null)
        {
            $price_max=(float)$price_max;
            $products=$products->where('price','<=',$price_max);
        }elseif ($price_min != null) {
            $price_min=(float)$price_min;
            $products=$products->where('price','>=',$price_min);
        }

        if($order_by != null)
        {
            $products = $products->orderBy($order_by,$order_status);
        }

        return $products->get();

    }

    public function getProductById($productId)
    {
        return Product::with('categories')->findOrFail($productId);
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $product->categories()->detach();
        Product::destroy($productId);
    }

    public function createProduct($product)
    {
        return Product::create($product);
    }

    public function updateProduct($productId,$product)
    {
        Product::whereId($productId)->update($product);
        return Product::with('categories')->findOrFail($productId);
    }

    public function getProductsByCategory($categoryId)
    {
        return Category::findOrFail($categoryId)->products()->get();
    }
}
