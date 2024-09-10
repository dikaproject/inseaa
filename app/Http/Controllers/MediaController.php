<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::all();
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf,mp4|max:1024',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName(); // Gunakan nama asli file

            // Pindahkan file ke lokasi penyimpanan yang diinginkan
            $file->move(public_path('media'), $fileName);

            // Simpan informasi file ke dalam database
            Media::create([
                'filename' => $fileName,
                'path' => '/media/' . $fileName, // Path yang bisa digunakan di editor atau tampilan web
            ]);

            return redirect()->route('admin.media.index')->with('success', 'Media uploaded successfully.');
        }

        return back()->with('error', 'File not uploaded.');
    }

    public function destroy(Media $media)
    {
        // Path ke file di direktori public
        $filePath = public_path('media/' . $media->filename);

        // Hapus file dari direktori public jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus entri dari database
        $media->delete();

        return redirect()->route('admin.media.index')->with('success', 'Media deleted successfully.');
    }
}
