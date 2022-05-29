<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->categoryRepository->getAllCategories()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $category = [
            "name" => $request->name,
        ];

        return response()->json(
            [
                'data' => $this->categoryRepository->createCategory($category)
            ],
            Response::HTTP_CREATED
        );
    }



    public function show(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');

        return response()->json([
            'data' => $this->categoryRepository->getCategoryById($categoryId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');
        $category = $request->only([
            "name",
        ]);

        $this->categoryRepository->updateCategory($categoryId, $category);
        return response()->json([
            'data' => $this->categoryRepository->getCategoryById($categoryId)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');
        $this->categoryRepository->deleteCategory($categoryId);

        $returnData = array(
            'status' => 'success',
            'message' => 'Deletion Successful'
        );
        return response()->json(['data'=>$returnData]);
    }


}
