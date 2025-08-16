@extends('layouts.app')

@section('title', 'Vidéos')
@section('meta_description', 'Toutes les vidéos publiées sur Capture Media.')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8">Vidéos</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($videos as $video)
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 flex flex-col">
                <a href="{{ route('posts.show', $video) }}">
                    <img src="{{ $video->featured_image_url }}" alt="{{ $video->title }}" class="w-full h-48 object-cover rounded mb-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $video->title }}</h2>
                </a>
                <div class="text-sm text-gray-500 mb-2">
                    {{ $video->formatted_published_date }} | {{ $video->author->name }}
                </div>
                <div class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3">
                    {{ $video->excerpt_limited }}
                </div>
                <a href="{{ route('posts.show', $video) }}" class="text-yellow-600 hover:underline mt-auto">Voir la vidéo</a>
            </div>
        @empty
            <p>Aucune vidéo trouvée.</p>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $videos->links() }}
    </div>
</div>
@endsection
