<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png|max:2048',
            'link_post' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('../../testimonial_images'), $imageName);
        }

        // Buat testimonial baru dengan nilai-nilai yang diterima dari form
        Testimonial::create([
            'name' => $request->name,
            'message' => $request->message,
            'image' => $imageName, // Atur nama file gambar
            'link_post' => $request->link_post,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'image' => 'file|mimes:jpeg,png|max:1024',
            'link_post' => 'required|string',
        ]);

        $imageName = $testimonial->image; // Tetapkan nilai awal dari kolom image
        if ($request->hasFile('image')) {
            // Hapus gambar terkait
            $oldImage = public_path('../../testimonial_images/' . $imageName);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('../../testimonial_images'), $imageName);
        }

        // Atur nilai kolom image ke nama file yang baru atau yang sama
        $testimonial->name = $request->name;
        $testimonial->message = $request->message;
        $testimonial->link_post = $request->link_post;
        $testimonial->image = $imageName;

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        File::delete(public_path('../../testimonial_images/' . $testimonial->image));

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
