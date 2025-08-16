@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt_limited)

@push('meta')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt_limited }}">
    <meta property="og:image" content="{{ $post->featured_image_url }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:author" content="{{ $post->author->name }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->excerpt_limited }}">
    <meta name="twitter:image" content="{{ $post->featured_image_url }}">
@endpush

@section('content')
<!-- Sponsors Section fixe et centré -->
@if(isset($sponsors) && count($sponsors) > 0)
<div class="w-full bg-white dark:bg-gray-900 py-3 border-b border-gray-200 dark:border-gray-800 mb-4 flex justify-center">
    <div class="flex items-center gap-8">
        @foreach($sponsors as $sponsor)
            <div>
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="h-12 w-auto object-contain" title="{{ $sponsor->name }}">
            </div>
        @endforeach
    </div>
</div>
@endif

<div class="max-w-7xl mx-auto py-12 px-2 sm:px-8 lg:px-16">
    <article class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl overflow-hidden border border-yellow-100 dark:border-yellow-900 relative">
        <!-- Featured image with overlay -->
        <div class="relative aspect-[16/9] overflow-hidden">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute top-4 left-4 flex items-center gap-2 z-10">
                <span class="px-3 py-1 bg-yellow-500 text-black text-xs font-semibold rounded-full shadow">{{ $post->category->name }}</span>
                @if($post->country)
                <span class="px-2 py-1 bg-white/80 dark:bg-gray-800/80 text-xs text-gray-700 dark:text-gray-200 rounded-full">{{ $post->country->name }}</span>
                @endif
            </div>
        </div>
        <div class="p-8 pt-6 sm:pt-10 relative z-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2">
                <div class="flex items-center gap-3">
                
                    <div>
                        <div class="text-sm text-gray-700 dark:text-gray-300 font-semibold">{{ $post->author->name }}</div>
                        <div class="text-xs text-gray-400 dark:text-gray-500">
                            {{ \Carbon\Carbon::parse($post->published_at)->locale('fr')->isoFormat('D MMMM YYYY') }}
                            • {{ round(str_word_count(strip_tags($post->content))/200) ?: 1 }} min de lecture
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 mt-2 sm:mt-0">
                    <!-- Share Buttons -->
                    <span class="text-xs text-gray-500 dark:text-gray-400">Partager :</span>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . $post->excerpt_limited . ' - par ' . $post->author->name . ' ' . url()->current()) }}" target="_blank" rel="noopener" class="hover:text-green-500" title="Partager sur WhatsApp">
                        <svg class="inline w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.93 11.93 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.63A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.67-.5-5.23-1.44l-.37-.22-3.69.97.99-3.59-.24-.37A9.94 9.94 0 1 1 12 22zm5.2-7.6c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.44-2.25-1.41-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.35-.01-.54-.01-.19 0-.5.07-.76.34-.26.27-1 1-.99 2.43.01 1.43 1.03 2.81 1.18 3.01.15.2 2.03 3.1 4.92 4.23.69.28 1.23.45 1.65.58.69.22 1.32.19 1.82.12.56-.08 1.65-.67 1.89-1.32.23-.65.23-1.2.16-1.32-.07-.12-.25-.19-.53-.33z"/></svg>
                    </a>
                    <a href="https://x.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title . ' - ' . $post->excerpt_limited . ' - par ' . $post->author->name) }}" target="_blank" rel="noopener" class="hover:text-blue-500" title="Partager sur X">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($post->title . ' - ' . $post->excerpt_limited . ' - par ' . $post->author->name) }}" target="_blank" rel="noopener" class="hover:text-blue-700" title="Partager sur Facebook">
                        <svg class="inline w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.326 24h11.495v-9.294H9.691v-3.622h3.13V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
                    </a>
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold mb-6 text-gray-900 dark:text-white leading-tight drop-shadow-lg">{{ $post->title }}</h1>
            <div class="prose dark:prose-invert max-w-none text-lg leading-relaxed mb-8">
                {!! $post->content !!}
            </div>
        </div>
    </article>
</div>

{{-- Articles similaires --}}
@if(isset($similarPosts) && $similarPosts->count() > 0)
<div class="max-w-4xl mx-auto mt-16 px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Articles similaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($similarPosts as $similar)
            <a href="{{ route('posts.show', $similar) }}" class="group block bg-white dark:bg-gray-900 rounded-2xl shadow-lg hover:shadow-2xl transition overflow-hidden border border-yellow-100 dark:border-yellow-900">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="{{ $similar->featured_image_url }}" alt="{{ $similar->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded-full">
                            {{ $similar->category->name }}
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($similar->published_at)->locale('fr')->isoFormat('D MMM YYYY') }}
                        </span>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1 line-clamp-2 group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors">
                        {{ $similar->title }}
                    </h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-2">{{ $similar->excerpt_limited }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif
@endsection


