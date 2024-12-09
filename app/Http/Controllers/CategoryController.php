<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function productValues()
    {
        $categories = Category::with('products')->get();
        $result = [];

        foreach ($categories as $category) {
            $categoryTotal = 0;

            foreach ($category->products as $product) { // Nested Loop
                if ($product->quantity > 0) { // Nested if
                    $totalValue = $product->quantity * $product->price; // Mathematics
                    $categoryTotal += $totalValue;
                }
            }

            $result[] = [
                'category' => $category->name,
                'total_value' => $categoryTotal,
            ];
        }

        $total = array_sum(array_column($result, 'total_value'));

        return view('products.product-values', [
            'result' => $result,
            'total' => $total
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
