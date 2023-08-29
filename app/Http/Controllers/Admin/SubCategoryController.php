<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::paginate(12);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        return view('admin.subcategories.create');
    }

    public function store(StoreSubCategoryRequest $request)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');

            SubCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);

            return redirect()->route('subcategories.index')->with('message', 'Sub Category created.');
        }

        return redirect()->route('subcategories.index');
    }

    public function edit(SubCategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');
            $subcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);
            return redirect()->route('subcategories.index')->with('message', 'Sub Category updated with image.');
        } else{
            $subcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id
            ]);
            return redirect()->route('subcategories.index')->with('message', 'Sub Category updated.');
        } 
    }

    public function destroy(SubCategory $subcategory)
    {
        Storage::delete($subcategory->image);
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('message', 'Sub Category deleted.');
    }
}
