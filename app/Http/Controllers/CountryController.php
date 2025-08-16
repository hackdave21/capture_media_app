<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Post;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return view('countries.index', compact('countries'));
    }

    public function show(Country $country)
    {
        $posts = Post::where('country_id', $country->id)
            ->with(['author', 'category'])
            ->latest('published_at')
            ->paginate(12);

        return view('countries.show', compact('country', 'posts'));
    }
}
