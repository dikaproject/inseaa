<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
            'active' => 'nullable|boolean',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('../../slider_images'), $imageName);

        Slider::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:1024',
        ]);

        $imageName = $slider->image; // Tetapkan nilai awal dari kolom image
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('../../slider_images/' . $slider->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('../../slider_images'), $imageName);
        }

        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->image = $imageName; // Tetapkan nilai baru untuk kolom image
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $oldImage = public_path('../../slider_images/' . $slider->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
