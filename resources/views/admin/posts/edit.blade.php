@extends('layouts.app')

@section('title', 'Modifier un article')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-yellow-500 font-semibold">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Retour admin
        </a>
    </div>
    <h1 class="text-2xl font-bold mb-6">Modifier l'article</h1>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <input type="text" name="title" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" value="{{ $post->title }}" required>
        <textarea name="content" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" rows="8" required>{{ $post->content }}</textarea>
        <input type="text" name="excerpt" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" value="{{ $post->excerpt }}" maxlength="500" required>
        <select name="category_id" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="country_id" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" @if($post->country_id == $country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
        </select>
        {{-- Champ auteur supprimé --}}
        <select name="type" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" required>
            <option value="">Type de contenu</option>
            <option value="article" @if($post->type == 'article') selected @endif>Article</option>
            <option value="video" @if($post->type == 'video') selected @endif>Vidéo</option>
        </select>
        {{-- Aperçu de l'image actuelle --}}
        @if($post->featured_image)
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Image actuelle</label>
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Image actuelle" class="w-32 h-20 object-cover rounded mb-2">
        </div>
        @endif
        <input type="file" name="featured_image" accept="image/*,video/*" class="w-full border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400 font-semibold">Mettre à jour</button>
    </form>
</div>
@endsection


