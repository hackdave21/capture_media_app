<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Country;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::published()
            ->featured()
            ->with(['author', 'category', 'country'])
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestArticles = Post::published()
            ->articles()
            ->with(['author', 'category', 'country'])
            ->latest('published_at')
            ->take(8)
            ->get();

        $latestVideos = Post::published()
            ->videos()
            ->with(['author', 'category', 'country'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $sponsors = \App\Models\Sponsor::all();

        $stats = [
            'articles' => Post::published()->articles()->count(),
            'countries' => Country::count(),
            'monthly_readers' => '100K+',
            'availability' => '24/7'
        ];

        return view('home', compact('featuredPosts', 'latestArticles', 'latestVideos', 'sponsors', 'stats'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q');
        $country_id = $request->get('country_id');

        $query = Post::published()->with(['author', 'category', 'country']);

        if ($q) {
            $query->where('title', 'like', "%{$q}%");
        }
        if ($country_id) {
            $query->where('country_id', $country_id);
        }

        $results = $query->latest('published_at')->get();

        return view('search', compact('results', 'q', 'country_id'));
    }
}