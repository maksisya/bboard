<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryResource(Category::all());
    }

    public function show(int $cat_id)
    {
        $category = Category::find($cat_id);
        if (!$category) {
            return ['failed'];
        }
        return new CategoryResource($category);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->input('name')
        ]);

        return $category;
    }
}
