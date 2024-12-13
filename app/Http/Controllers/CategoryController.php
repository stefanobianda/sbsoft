<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    // @desc Show all categories
    // @route GET /categories
    public function index(): View
    {
        $categories = Category::all();
        return view("categories.index")->with("categories", $categories);
    }

    // CRUD section
    // @desc Show create category form
    // @route GET /categories/create
    public function create(): View
    {
        return view("categories.create");
    }

    // @desc Show a single category
    // @route GET /categories/{$id}
    public function show(Category $category): View
    {
        return view("categories.show")->with("category", $category);
    }

    // @desc Show edit category form
    // @route GET /categories/{$id}/edit
    public function edit(Category $category): View
    {
        return view("categories.edit")->with("category", $category);
    }

    // @desc Save the new category
    // @route POST /categories
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
        ]);

        $category = Category::create($validatedData);

        return redirect()->route("categories.index")->with("success","Category created successfully!");
    }

    // @desc Update the existing category
    // @route PUT /categories/{$id}
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validatedData = $request->validate([
            "name"=> "required|string|max:20",
            "description"=> "nullable|string|max:100",
        ]);

        $category->update($validatedData);

        return redirect()->route("categories.show")->with("success","Category updated successfully!");
    }

    // @desc delete a category
    // @route DELETE /categories/{$id}    
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route("categories.index")->with("success","Category deleted successfully!");
    }

}
