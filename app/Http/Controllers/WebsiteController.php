<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->get();
        return view('welcome',compact('categories','posts'));
    }
    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = Post::where('category_id',$category->id)->get();
        return view('category',compact('category','posts'));
    }
    public function details($slug)
    {
        $post = Post::where('slug',$slug)->first();

        return view('post',compact('post'));

    }
}
