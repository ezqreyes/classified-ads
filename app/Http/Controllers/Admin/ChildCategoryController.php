<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildCategoryRequest;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $childcategories = ChildCategory::paginate(12);
        return view('admin.childcategories.index', compact('childcategories'));
    }

    public function create()
    {
        return view('admin.childcategories.create');
    }

    public function store(StoreChildCategoryRequest $request)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/childcategories');

            ChildCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image' => $path
            ]);

            return redirect()->route('childcategories.index')->with('message', 'Child Category created.');
        }

        return redirect()->route('childcategories.index');
    }

    public function edit(ChildCategory $childcategory)
    {
        return view('admin.childcategories.edit', compact('childcategory'));
    }

    public function update(Request $request, ChildCategory $childcategory)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/childcategories');
            $childcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image' => $path
            ]);
            return redirect()->route('childcategories.index')->with('message', 'Child Category updated with image.');
        } else{
            $childcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id
            ]);
            return redirect()->route('childcategories.index')->with('message', 'Child Category updated.');
        } 
    }

    public function destroy(ChildCategory $childcategory)
    {
        Storage::delete($childcategory->image);
        $childcategory->delete();

        return redirect()->route('childcategories.index')->with('message', 'Child Category deleted.');
    }
}
