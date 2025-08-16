<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with(['author', 'category', 'country']);

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        if ($request->has('country')) {
            $country = Country::where('slug', $request->country)->firstOrFail();
            $query->where('country_id', $country->id);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $posts = $query->latest('published_at')->paginate(12);
        
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $sponsors = \App\Models\Sponsor::all();
        $similarPosts = \App\Models\Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->published()
            ->latest('published_at')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'sponsors', 'similarPosts'));
    }

    public function videos()
    {
        $videos = Post::published()
            ->videos()
            ->with(['author', 'category', 'country'])
            ->latest('published_at')
            ->paginate(12);

        return view('posts.videos', compact('videos'));
    }
}