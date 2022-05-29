<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request): JsonResponse
    {

        $name = $request->get('name');
        $description = $request->get('description');
        $is_home = $request->get('is_home');
        $is_active = $request->get('is_active');
        $price_min = $request->get('price_min');
        $price_max = $request->get('price_max');
        $order_by = $request->order_by;
        $order_status = $request->order_status;

        if ($name || $description || $is_home || $is_active || $price_min || $price_max || $order_by || $order_status)
        {
            return response()->json([
                'data' => $this->productRepository->getFilterProducts($name,$description,$is_home,$is_active,$price_min,$price_max,$order_by,$order_status)
            ]);
        }

        return response()->json([
            'data' => $this->productRepository->getAllProducts()
        ]);


    }

    public function store(Request $request): JsonResponse
    {
        $product = [
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "description" => $request->description,
            "is_active" => $request->is_active,
            "is_home" => $request->is_home
        ];
        $data = $this->productRepository->createProduct($product);
        $categories_id = array_map('intval', explode(',', $request->category_id));
        $data->categories()->attach($categories_id);
        $data->save();

        return response()->json(
            [
                'data' => $data
            ],
            Response::HTTP_CREATED
        );
    }



    public function show(Request $request): JsonResponse
    {
        $productId = $request->route('id');

        return response()->json([
            'data' => $this->productRepository->getProductById($productId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $productId = $request->route('id');
        $product = $request->only([
            "name",
            "slug",
            "price",
            "description",
            "is_active",
            "is_home"
        ]);

        $data = $this->productRepository->updateProduct($productId, $product);
        if ($request->category_id)
        {
            $data->categories()->detach();
            if (Str::contains($request->category_id, ','))
            {
                $categories_id = array_map('intval', explode(',', $request->category_id));
                $data->categories()->attach($categories_id);
                $data->save();
            } else {
                $data->categories()->attach($request->category_id);
                $data->save();
            }
        }

        return response()->json([
            'data' => $this->productRepository->getProductById($productId)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $productId = $request->route('id');
        $this->productRepository->deleteProduct($productId);

        $returnData = array(
            'status' => 'success',
            'message' => 'Deletion Successful'
        );
        return response()->json(['data' => $returnData]);
    }

    public function getProductsByCategory(Request $request) : JsonResponse
    {
        $categoryId= $request->route('categoryId');
        return response()->json([
            'data' => $this->productRepository->getProductsByCategory($categoryId)
        ]);
    }
}
