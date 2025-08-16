@extends('layouts.app')

@section('title', 'Administration')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-2 sm:px-4">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Administration</h1>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg shadow transition-all duration-200 text-sm sm:text-base">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajouter un article
            </a>
            <a href="{{ route('admin.sponsors.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white font-semibold rounded-lg shadow transition-all duration-200 text-sm sm:text-base">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14v7m-5-5h10"/>
                </svg>
                Ajouter un sponsor
            </a>
            <a href="{{ route('admin.authors.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-green-500 hover:bg-green-400 text-white font-semibold rounded-lg shadow transition-all duration-200 text-sm sm:text-base">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Gérer les auteurs
            </a>
        </div>
    </div>
    <!-- Statistiques visiteurs -->
    <div class="mb-6 flex items-center space-x-4">
        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full text-xs font-semibold">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Visiteurs uniques : <span id="visitor-count" class="ml-1">...</span>
            <button id="show-ips-btn" class="ml-3 px-2 py-1 bg-yellow-400 hover:bg-yellow-500 text-black rounded text-xs font-semibold transition">Voir plus</button>
        </span>
    </div>
    <div id="ip-list-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-2xl p-6 w-full max-w-xs relative">
            <button id="close-ip-list" class="absolute top-2 right-2 text-gray-400 hover:text-yellow-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Adresses IP des visiteurs</h3>
            <ul id="ip-list" class="text-sm text-gray-700 dark:text-gray-200 space-y-1 max-h-60 overflow-y-auto"></ul>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-2 sm:p-6">
        @isset($posts)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-xs sm:text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aperçu</th>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Titre</th>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Auteur</th>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Catégorie</th>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Publié</th>
                            <th class="px-2 py-2 sm:px-4 sm:py-3 text-left font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($posts as $post)
                        <tr>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">
                                @if($post->featured_image_url)
                                    <img src="{{ $post->featured_image_url }}" alt="aperçu" class="h-10 w-16 sm:h-12 sm:w-20 object-cover rounded">
                                @else
                                    <span class="text-gray-400 text-xs">Aucune image</span>
                                @endif
                            </td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 font-semibold text-gray-900 dark:text-white max-w-[120px] sm:max-w-xs truncate">{{ $post->title }}</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-gray-700 dark:text-gray-300 max-w-[80px] sm:max-w-xs truncate">{{ $post->author->name }}</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-gray-700 dark:text-gray-300 max-w-[80px] sm:max-w-xs truncate">{{ $post->category->name }}</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">
                                <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $post->is_published ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ $post->is_published ? 'Oui' : 'Non' }}
                                </span>
                            </td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">
                                <!-- Desktop actions -->
                                <div class="hidden sm:flex flex-row gap-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded transition-all text-xs font-semibold">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6"/>
                                        </svg>
                                        
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-400 text-white rounded transition-all text-xs font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            
                                        </button>
                                    </form>
                                </div>
                                <!-- Mobile slide actions -->
                                <div class="sm:hidden">
                                    <div x-data="{ open: false }" class="relative">
                                        <button @click="open = !open" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-400 text-black rounded text-xs font-semibold">
                                            Actions
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 rounded shadow-lg z-10">
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 dark:hover:bg-gray-700">Modifier</a>
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-gray-700">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-300">Utilisez le menu pour gérer les articles et les sponsors.</p>
        @endisset
    </div>
</div>
<!-- Compteur visiteurs (JS, stockage local) -->
<script>
    // Stockage IP simple (non sécurisé, pour démo)
    function getIp(callback) {
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => callback(data.ip));
    }
    function updateVisitorCount() {
        let visits = JSON.parse(localStorage.getItem('cm_visits') || '[]');
        getIp(function(ip) {
            // Ajoute la visite si l'IP n'existe pas déjà
            if (!visits.some(v => v.ip === ip)) {
                visits.push({ip: ip, date: new Date().toISOString()});
                localStorage.setItem('cm_visits', JSON.stringify(visits));
            }
            document.getElementById('visitor-count').textContent = visits.length;
        });
    }
    document.addEventListener('DOMContentLoaded', updateVisitorCount);

    // Voir plus : afficher la liste des IPs + date/heure
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('show-ips-btn');
        const modal = document.getElementById('ip-list-modal');
        const closeBtn = document.getElementById('close-ip-list');
        const ipList = document.getElementById('ip-list');
        if (btn && modal && closeBtn && ipList) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let visits = JSON.parse(localStorage.getItem('cm_visits') || '[]');
                ipList.innerHTML = '';
                if (visits.length === 0) {
                    ipList.innerHTML = '<li>Aucune IP enregistrée.</li>';
                } else {
                    visits.forEach(v => {
                        // Format date/heure locale
                        let d = new Date(v.date);
                        let dateStr = d.toLocaleDateString() + ' ' + d.toLocaleTimeString();
                        ipList.innerHTML += `<li><span class="font-mono">${v.ip}</span> <span class="text-xs text-gray-400 ml-2">${dateStr}</span></li>`;
                    });
                }
                modal.classList.remove('hidden');
            });
            closeBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
            // Fermer modal si clic en dehors
            modal.addEventListener('click', function(e) {
                if (e.target === modal) modal.classList.add('hidden');
            });
        }
    });
</script>
@endsection

