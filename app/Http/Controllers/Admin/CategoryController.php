<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/categories');

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);

            return redirect()->route('categories.index')->with('message', 'Category created.');
        }

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/categories');
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('categories.index')->with('message', 'Category updated with image.');
        } else{
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->route('categories.index')->with('message', 'Category updated.');
        } 
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category deleted.');
    }

}
