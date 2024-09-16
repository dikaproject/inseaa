<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    function create()
    {
        return view('admin.blog.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'short_description' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('blog_images'), $imageName);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->content = $request->content;
        $blog->short_description = $request->short_description;
        $blog->slug = Str::slug($request->title);
        $blog->image = $imageName;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
    }

    function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'short_description' => 'required|string|max:255',
            'image' => 'file|mimes:jpeg,png,jpg|max:1024',
            'slug' => 'required|string|max:255',
        ]);

        $imageName = $blog->image;
        if ($request->hasFile('image')) {
            $oldImage = public_path('blog_images/'.$blog->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('blog_images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->content = $request->content;
        $blog->image = $imageName ?? null;
        $blog->short_description = $request->short_description;

        if ($request->filled('slug')) {
            $blog->slug = Str::slug($request->slug);
        }
        else {
            $blog->slug = Str::slug($request->title);
        }

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    function show(Blog $blog)
    {
        $categories = Category::all();
        $blogs = Blog::all();
        return view('blogs.detail', compact('blog', 'categories', 'blogs'));
    }

    function destroy(Blog $blog)
    {

        $oldImage = public_path('blog_images/'.$blog->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }
}
