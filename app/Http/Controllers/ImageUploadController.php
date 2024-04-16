<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
        ]);

        $title = $request->title;
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        // Upload to Minio
        Storage::disk('minio')->put($imageName, file_get_contents($image));

        return back()->with('success', 'Image uploaded successfully.');
    }
}
