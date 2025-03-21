<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function about()
    {
        return view('about');
    }
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        return view('index', compact('posts'));
    }
}
