<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
            'title' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $imageName = $validatedData['title'] . '.' . $image->getClientOriginalExtension();

        // Store image in MinIO
        $path = Storage::disk('minio')->put('img/gallery/' . $imageName , file_get_contents($image));

        // Save image details of image to database
        $newImage = Image::create([
            'image' => $imageName, 
        ]);

        return response()->json(['message' => 'Image uploaded successfully!', 'image' => $newImage]);
    }
}
