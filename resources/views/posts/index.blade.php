@extends('layouts.app')

@section('title', 'Tous les articles')
@section('meta_description', 'Liste de tous les articles publiés sur Capture Media.')

@section('content')

<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8">Tous les articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 flex flex-col">
                <a href="{{ route('posts.show', $post) }}">
                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded mb-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                </a>
                <div class="text-sm text-gray-500 mb-2">
                    {{ $post->formatted_published_date }} | {{ $post->author->name }}
                </div>
                <div class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3">
                    {{ $post->excerpt_limited }}
                </div>
                <a href="{{ route('posts.show', $post) }}" class="text-yellow-600 hover:underline mt-auto">Lire l'article</a>
            </div>
        @empty
            <p>Aucun article trouvé.</p>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection
