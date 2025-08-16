@extends('layouts.app')

@section('title', 'Capture Media - Actualité Africaine')
@section('meta_description', 'Votre source d\'actualité africaine de référence. Découvrez nos analyses sur la politique, l\'économie, la santé et la culture africaines.')

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

<!-- Hero Section réduit -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black dark:from-yellow-500 dark:via-yellow-400 dark:to-yellow-500 text-white dark:text-black overflow-hidden min-h-[60vh] flex items-center">
    <div class="absolute inset-0 bg-black/40 dark:bg-black/10"></div>
    <div class="absolute inset-0 opacity-10 pointer-events-none select-none">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/20 to-transparent"></div>
        <svg class="absolute bottom-0 left-0 w-full h-32 text-yellow-500/20 fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"></path>
        </svg>
        <!-- Logo fondu en fond -->
        <img src="{{ asset('IMG_0016.JPG') }}" alt="Logo Capture Media" 
             class="absolute inset-0 m-auto w-96 h-96 max-w-[50vw] max-h-[50vh] opacity-1 dark:opacity-2 object-contain pointer-events-none select-none"
             style="z-index:1;">
    </div>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">
            L'actualité africaine<br>
            <span class="text-yellow-400 dark:text-black bg-black/20 dark:bg-yellow-300/30 px-3 py-1 rounded-lg inline-block">en temps réel</span>
        </h1>
        <p class="text-lg md:text-2xl text-gray-200 dark:text-gray-800 max-w-2xl mx-auto mb-6 font-medium drop-shadow">
            Restez informé avec nos analyses approfondies sur la politique, l'économie, la santé et la culture africaines.
        </p>
        <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-bold rounded-lg shadow-lg text-base transition-all duration-200 transform hover:scale-105">
            Découvrir nos articles
            <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
</section>

<!-- Featured Articles Section -->
@if($featuredPosts->count() > 0)
<div class="py-20">
    

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @foreach($featuredPosts as $index => $post)
        <article class="group relative {{ $index === 0 ? 'lg:col-span-2 lg:row-span-2' : '' }}">
            <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gray-800 shadow-2xl transition-all duration-500 group-hover:shadow-3xl group-hover:-translate-y-2">
                <a href="{{ route('posts.show', $post) }}">
                    <div class="aspect-{{ $index === 0 ? '[16/10]' : '[4/3]' }} overflow-hidden">
                        <img src="{{ $post->featured_image_url }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                </a>
                <div class="absolute inset-0 flex flex-col justify-end p-6 text-white pointer-events-none">
                    <div class="flex items-center space-x-4 mb-3">
                        <span class="px-3 py-1 bg-yellow-500 text-black text-sm font-medium rounded-full">
                            {{ $post->category->name }}
                        </span>
                        @if($post->country)
                        <span class="text-sm text-gray-300">{{ $post->country->name }}</span>
                        @endif
                        <span class="text-sm text-gray-300">
                            {{ \Carbon\Carbon::parse($post->published_at)->locale('fr')->isoFormat('D MMMM YYYY') }}
                        </span>
                    </div>
                    
                    <h2 class="text-{{ $index === 0 ? '2xl md:text-3xl' : 'xl' }} font-bold mb-3 leading-tight">
                        {{ $post->title }}
                    </h2>
                    
                    @if($index === 0)
                    <p class="text-gray-300 mb-4 line-clamp-3">{{ $post->excerpt_limited }}</p>
                    @endif
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $post->author->photo_url }}" 
                                 alt="{{ $post->author->name }}" 
                                 class="w-8 h-8 rounded-full object-cover">
                            <span class="text-sm font-medium">{{ $post->author->name }}</span>
                        </div>
                        <a href="{{ route('posts.show', $post) }}" 
                           class="inline-flex items-center text-yellow-400 hover:text-yellow-300 transition-colors duration-200 pointer-events-auto font-semibold">
                            <span class="text-sm font-medium mr-2">Lire la suite</span>
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
@endif

<!-- Latest Articles Section -->
@if($latestArticles->count() > 0)
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Derniers Articles
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    Nos analyses les plus récentes sur l'actualité africaine
                </p>
            </div>
            <a href="{{ route('posts.index') }}" 
               class="hidden md:inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200 transform hover:scale-105">
                <span>Voir tous les articles</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($latestArticles as $article)
            <article class="group">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-2 overflow-hidden">
                    <a href="{{ route('posts.show', $article) }}">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $article->featured_image_url }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded-full">
                                {{ $article->category->name }}
                            </span>
                            @if($article->country)
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $article->country->name }}</span>
                            @endif
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($article->published_at)->locale('fr')->isoFormat('D MMMM YYYY') }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors duration-200">
                            <a href="{{ route('posts.show', $article) }}">{{ $article->title }}</a>
                        </h3>
                        
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                            {{ $article->excerpt_limited }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $article->author->name }}</span>
                            </div>
                            <a href="{{ route('posts.show', $article) }}" class="text-yellow-600 hover:underline font-semibold">Lire la suite</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-12 md:hidden">
            <a href="{{ route('posts.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200">
                <span>Voir tous les articles</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Videos Section -->
@if($latestVideos->count() > 0)
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Dernières Vidéos
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    Nos reportages et analyses en vidéo
                </p>
            </div>
            <a href="{{ route('posts.videos') }}" 
               class="hidden md:inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200 transform hover:scale-105">
                <span>Voir toutes les vidéos</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestVideos as $video)
            <article class="group">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-2 overflow-hidden">
                    <a href="{{ route('posts.show', $video) }}">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="{{ asset('storage/' . $video->featured_image_url) }}" 
                                 alt="{{ $video->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <!-- Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition-colors duration-200">
                                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center shadow-2xl transform transition-all duration-200 group-hover:scale-110">
                                    <svg class="w-8 h-8 text-black ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 text-xs font-medium rounded-full">
                                Vidéo
                            </span>
                            <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-medium rounded-full">
                                {{ $video->category->name }}
                            </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($video->published_at)->locale('fr')->isoFormat('D MMMM YYYY') }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors duration-200">
                            <a href="{{ route('posts.show', $video) }}">{{ $video->title }}</a>
                        </h3>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center space-x-2">
                                
                                <span>{{ $video->author->name }}</span>
                            </div>
                            <a href="{{ route('posts.show', $video) }}" class="text-yellow-600 hover:underline font-semibold">Lire la suite</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-12 md:hidden">
            <a href="{{ route('posts.videos') }}" 
               class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200">
                <span>Voir toutes les vidéos</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Nos Objectifs Section -->
<section class="py-20 bg-gray-100 dark:bg-gray-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-2/3">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Nos objectifs</h2>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                <span class="font-semibold text-yellow-500">Capture Media</span> s’est donné pour mission de devenir la référence de l’actualité africaine, en offrant une information fiable, indépendante et accessible à tous. 
                <br><br>
                Nous voulons valoriser la diversité des voix africaines, promouvoir la culture, l’innovation, l’entrepreneuriat et l’éveil citoyen sur le continent. Notre objectif est de donner la parole à ceux qui font bouger l’Afrique, de décrypter les enjeux majeurs et d’inspirer les générations futures.
            </p>
        </div>
        <div class="md:w-1/3 flex justify-center">
            <div class="relative group">
                <div class="absolute -inset-2 bg-yellow-400 rounded-3xl blur opacity-30 group-hover:opacity-60 transition"></div>
                <img src="{{ asset('IMG_0016.JPG') }}" alt="Logo Capture Media" class="w-66 h-66 object-cover rounded-3xl border-4 border-yellow-400 shadow-xl relative z-10">
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (!localStorage.getItem('cm_cookie_consent')) {
        let banner = document.createElement('div');
        banner.id = 'cookie-banner-cm';
        banner.className = 'fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow-lg rounded-xl px-6 py-4 flex flex-col sm:flex-row items-center gap-4 max-w-lg w-full';
        banner.innerHTML = `
            <span class="text-gray-800 dark:text-gray-100 text-sm flex-1">
                Ce site utilise des cookies pour améliorer votre expérience. En continuant, vous acceptez notre politique de confidentialité.
            </span>
            <div class="flex gap-2">
                <button id="cm-cookie-accept" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg text-sm">Accepter</button>
                <button id="cm-cookie-close" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg text-sm">Fermer</button>
            </div>
        `;
        document.body.appendChild(banner);

        document.getElementById('cm-cookie-accept').onclick = function() {
            localStorage.setItem('cm_cookie_consent', '1');
            banner.remove();
        };
        document.getElementById('cm-cookie-close').onclick = function() {
            banner.remove();
        };
    }
});
</script>
@endpush