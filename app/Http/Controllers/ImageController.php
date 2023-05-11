<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');
        $filename = time() . '.webp';

        InterventionImage::make($image)->encode('webp', 100)->save(public_path('uploads/' . $filename));

        Image::create([
            'filename' => $filename
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function download($filename)
    {
        // Load the image file using Intervention Image
        $image = InterventionImage::make(public_path('uploads/' . $filename));

        // Return the WebP image as a response
        return $image->response('webp');
    }
}
