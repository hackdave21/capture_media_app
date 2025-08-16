<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post; // Ajouté pour l'édition d'article
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('name')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);
        Author::create($data);
        return redirect()->route('admin.authors.index')->with('success', 'Auteur ajouté.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Auteur supprimé.');
    }
}

