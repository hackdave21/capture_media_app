@extends('layouts.app')

@section('title', 'Ajouter un article')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <!-- Bouton retour admin -->
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-yellow-500 font-semibold">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Retour admin
        </a>
    </div>
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Ajouter un article</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
        @csrf
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Titre</label>
            <input type="text" name="title" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Titre" required>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Contenu</label>
            <textarea name="content" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" rows="8" placeholder="Contenu" required></textarea>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Résumé</label>
            <input type="text" name="excerpt" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Résumé" required>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Catégorie</label>
            <select name="category_id" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
                <option value="">Catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Pays</label>
            <select name="country_id" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
                <option value="">Pays</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Auteur</label>
            <select name="author_id" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
                <option value="">Sélectionner un auteur</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Type de contenu</label>
            <select name="type" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
                <option value="">Type de contenu</option>
                <option value="article">Article</option>
                <option value="video">Vidéo</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Image ou vidéo</label>
            <input type="file" name="featured_image" accept="image/*,video/*" class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
        </div>
        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
