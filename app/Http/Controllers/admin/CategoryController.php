<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\SearchCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( SearchCategoryRequest $request )
    {
        $query = Category::query();

        if($request->validated('nom')) {
            $query = $query->where('nom', 'like', "%{$request->validated('nom')}%");
        }
        if($request->validated('description')) {
            $query = $query->where('description', 'like', "%{$request->validated('description')}%");
        }

        return view('admin.categorie.index', [
            'categories' => $query->orderBy('created_at', 'asc')->paginate(10),
            'input' => $request->validated()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorie.create', [
            'category' => new Category(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.category.index')->with('success', 'Categorie bien ajouté');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categorie.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.category.index')->with('success', 'Categorie bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Categorie bien supprimé');
    }
}
