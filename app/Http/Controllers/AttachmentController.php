<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AttachmentController extends Controller
{
    public function create($productId)
    {
        return view('admin.attachment.create', compact('productId'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'attachments.*' => 'required|file|mimes:pdf|max:2048',
            'names.*' => 'required|string|max:255',
            'descriptions.*' => 'required|string',
        ]);

        foreach ($request->attachments as $key => $attachment) {
            $attachmentName = $attachment->getClientOriginalName();
            $attachment->move(public_path('product_attachments'), $attachmentName);

            Attachment::create([
                'product_id' => $productId,
                'filename' => $attachmentName,
                'original_name' => $attachment->getClientOriginalName(),
                'name' => $request->names[$key],
                'description' => $request->descriptions[$key],
            ]);
        }

        return redirect()->route('admin.products.index', $productId)->with('success', 'Attachments added successfully.');
    }

    public function deleteAllAttachments($productId)
    {

        Attachment::where('product_id', $productId)->delete();

        return redirect()->route('admin.products.index', $productId)->with('success', 'All attachments deleted successfully.');
    }
}
