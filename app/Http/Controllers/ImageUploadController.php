<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); 

        // Store image in MinIO
        $path = Storage::disk('minio')->put('images/' . $imageName, $image);

        // Save image details (including path) to database
        $newImage = Image::create([
            'title' => $request->input('title'),
            'name' => $imageName,
            'type' => $image->getClientMimeType(),
            'path' => $path,
        ]);

        return response()->json(['message' => 'Image uploaded successfully!', 'image' => $newImage]);
    }
}
