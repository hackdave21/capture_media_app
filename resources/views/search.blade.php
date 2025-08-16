{{-- filepath: d:\Laravel\CaptureMediaNew\resources\views\search.blade.php --}}
@extends('layouts.app')

@section('title', 'Recherche')
@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Recherche</h1>
    <form method="GET" action="{{ route('search') }}" class="mb-8 flex flex-col md:flex-row gap-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Titre de l'article..." class="flex-1 border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
        <select name="country_id" class="border rounded p-2 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <option value="">Tous les pays</option>
            @foreach(\App\Models\Country::all() as $country)
                <option value="{{ $country->id }}" @if(request('country_id') == $country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-400 font-semibold">Rechercher</button>
    </form>

    @if(isset($results))
        @if($results->count())
            <ul class="space-y-4">
                @foreach($results as $post)
                <li class="bg-white dark:bg-gray-900 rounded-lg shadow p-4">
                    <a href="{{ route('posts.show', $post) }}" class="text-lg font-bold text-yellow-600 dark:text-yellow-400 hover:underline">{{ $post->title }}</a>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $post->country ? $post->country->name : 'Pays inconnu' }} | {{ $post->category->name ?? '' }}
                    </div>
                    <div class="mt-2 text-gray-700 dark:text-gray-200 line-clamp-2">{{ $post->excerpt_limited }}</div>
                </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 dark:text-gray-400">Aucun article trouvé.</p>
        @endif
    @endif
</div>
@endsection
