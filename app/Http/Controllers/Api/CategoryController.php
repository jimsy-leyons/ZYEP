<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // Get only top-level categories with their subcategories
        $categories = Category::with('subcategories')
            ->whereNull('parent_id')
            ->where('status', 1)
            ->get();
            
        return response()->json(['categories' => $categories]);
    }

    /**
     * Store a new category (Admin only).
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => 'nullable|exists:mcategories,id',
            'name' => 'required|string|max:100',
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = Category::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
            'status' => 1
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

    /**
     * Update a category (Admin only).
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'parent_id' => 'nullable|exists:mcategories,id',
            'name' => 'required|string|max:100',
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category->update($request->only('parent_id', 'name', 'icon', 'description'));

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    /**
     * Delete a category (Admin only).
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Check if category has providers before deleting, or just soft-delete/deactivate
        if ($category->providers()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete category with active providers. Deactivate it instead.'
            ], 422);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
