<?php

// app/Http/Controllers/ImageController.php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $image = new Image();
        $image->title = $request->title;
        $image->image_path = $imagePath;
        $image->save();

        return response()->json('Image created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($image->image_path);
            $imagePath = $request->file('image')->store('images', 'public');
            $image->image_path = $imagePath;
        }

        $image->save();

        return response()->json('Image updated successfully');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json('Image deleted successfully');
    }
}
