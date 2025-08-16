<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Author; // Utilisez le modèle Author pour la table authors

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category', 'country'])->latest()->paginate(10);
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all(); // Charger les auteurs depuis la table authors
        $countries = Country::all();
        return view('admin.posts.create', compact('categories', 'authors', 'countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'country_id' => 'required|exists:countries,id',
            'author_id' => 'required|exists:authors,id',
            'type' => 'required|in:article,video',
            'featured_image' => 'required|file|mimes:jpg,jpeg,png,webp,gif,mp4,mov,avi,webm|max:20480',
        ]);

        // Gestion de l'upload image/vidéo
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $path = $file->store('posts', 'public');
            $validated['featured_image'] = $path;
        }

        // Slug automatique si besoin
        $validated['slug'] = \Str::slug($validated['title']);

        // Publier l'article par défaut
        $validated['is_published'] = true;

        \App\Models\Post::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Article ajouté avec succès.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $authors = User::all();
        $countries = Country::all();
        return view('admin.posts.edit', compact('post', 'categories', 'authors', 'countries'));
    }

    public function update(Request $request, \App\Models\Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'country_id' => 'required|exists:countries,id',
            'type' => 'required|in:article,video',
            'featured_image' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi,webm|max:20480',
        ]);

        // Correction : assigner explicitement le résumé
        $post->excerpt = $validated['excerpt'];

        // Mettre à jour les autres champs
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->country_id = $validated['country_id'];
        $post->type = $validated['type'];

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $path = $file->store('posts', 'public');
            $post->featured_image = $path;
        }

        $post->save();

        return redirect()->route('admin.dashboard')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Article supprimé.');
    }
}

