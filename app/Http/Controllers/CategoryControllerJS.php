<?php

namespace App\Http\Controllers;

use App\Models\CategoryJS;
use Illuminate\Http\Request;

class CategoryControllerJS extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $categories = CategoryJS::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        CategoryJS::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created!');
    }

    public function edit(CategoryJS $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, CategoryJS $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy(CategoryJS $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted!');
    }
}
