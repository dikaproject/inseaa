<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
            'slug' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('category_images'), $imageName);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName ?? null;

        if ($request->filled('slug')) {
            $category->slug = Str::slug($request->slug);
        } else {
            $category->slug = Str::slug($request->name);
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category Has Been created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:1024',
            'slug' => 'nullable|string|max:255',
        ]);

        $imageName = $category->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('category_images'), $imageName);
            $category->update(['image' => $imageName]);

            // Hapus gambar lama jika ada
            $oldImage = public_path('category_images/' . $category->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName ?? null,
            'slug' => $slug ?? Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category Has Been updated successfully.');
    }

    public function show($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->with('products')->firstOrFail();
        return view('category.detail', compact('category', 'categories'));
    }

    public function allcategory()
    {
        $categories = Category::all();
        return view('category.allcategory', compact('categories'));
    }

    public function destroy(Category $category)
    {
        $oldImage = public_path('category_images/' . $category->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category Has Been deleted successfully.');
    }
}
