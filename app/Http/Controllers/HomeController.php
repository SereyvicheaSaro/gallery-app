<?php

namespace App\Http\Controllers;

use App\Models\Image;


class HomeController extends Controller
{
    public function home()
    {
        $images = Image::take(7)->get();
        return view('home', compact('images'));
    }
    public function gallery()
    {
        $images = Image::all();
        return view('gallery', compact('images'));
    }

    public function blog()
    {
        return view('blog');
    }
    public function blogSingle()
    {
        return view('blog-single');
    }
    public function contact()
    {
        return view('contact');
    }

}
