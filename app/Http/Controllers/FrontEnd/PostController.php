<?php

namespace App\Http\Controllers\FrontEnd;

use App\BlogPage;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('is_published', 1)->orderBy('id','desc')->paginate(10);
        return view('website.blog', compact('posts'));
    }

    public function categoryWisePost() {
        $category = Category::where('slug', request()->slug )->first();
        $posts = Post::where('category_id', $category->id)->orderBy('id','desc')->paginate(10);
        return view('website.category-wise', compact('posts'));
    }

    public function search(Request $request)
    {
        $key = trim($request->get('query'));
        $posts = Post::query()
                ->where('title', 'like', "%{$key}%")
                ->orWhere('slug', 'like', "%{$key}%")
                ->orWhere('description', 'like', "%{$key}%")
                ->orderBy('created_at', 'desc')->paginate(20);
        return view('website.blog', compact('posts'));
    }

    public function single() {
        $post = Post::where('slug', request()->slug )->first();
        return view('website.single', compact('post'));
    }

}
