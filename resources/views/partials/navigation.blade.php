<nav 
    class="sticky top-0 z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 transition-all duration-300" 
    x-data="{
        mobileMenuOpen: false, 
        searchOpen: false,
        adminLoginOpen: false, // <-- ajoutez cette ligne
        activeDropdown: null,
        darkMode: localStorage.getItem('theme') === 'dark' || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches),
        toggleDark() {
            this.darkMode = !this.darkMode;
            if(this.darkMode) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        }
    }"
    x-init="if(darkMode){document.documentElement.classList.add('dark');}else{document.documentElement.classList.remove('dark');}"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('IMG_0016.JPG') }}" alt="Logo Capture Media" class="w-10 h-10 rounded-lg object-cover border-2 border-yellow-400 shadow" />
                    <div class="hidden sm:block">
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Capture</span>
                        <span class="text-xl font-bold text-yellow-500">Media</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block flex-1 max-w-2xl mx-8">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200">
                        Accueil
                    </a>
                    
                    <a href="{{ route('posts.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200">
                        Actualité
                    </a>

                    <!-- Articles Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200 flex items-center space-x-1">
                            <span>Articles</span>
                            <svg class="w-4 h-4 transform transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-2 z-50"
                             x-cloak>
                            @foreach(\App\Models\Category::take(4)->get() as $category)
                            <a href="{{ route('categories.show', $category) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-yellow-500 transition-colors duration-200">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Videos Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200 flex items-center space-x-1">
                            <span>Vidéos</span>
                            <svg class="w-4 h-4 transform transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-2 z-50"
                             x-cloak>
                            @foreach(\App\Models\Category::take(4)->get() as $category)
                            <a href="{{ route('posts.videos') }}?category={{ $category->slug }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-yellow-500 transition-colors duration-200">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200">
                        À propos
                    </a>
                    {{-- <a href="{{ route('apropos.capturemedia') }}" class="text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 font-medium transition-colors duration-200">
                        Propos sur Capture Media
                    </a> --}}
                </div>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                <!-- Search Button -->
                <button @click="searchOpen = true; mobileMenuOpen = false" class="p-2 text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                <!-- Theme Toggle -->
                <button @click="toggleDark()" class="p-2 text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors duration-200" title="Changer le thème">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <!-- Admin Eye Icon -->
                <button 
                    @click.prevent="adminLoginOpen = true; mobileMenuOpen = false" 
                    class="p-2 text-gray-700 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors duration-200" 
                    title="Accès admin"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-gray-700 dark:text-gray-300 hover:text-yellow-500">
                    <svg class="w-6 h-6" :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700"
             x-cloak>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    Accueil
                </a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    Actualité
                </a>
                <a href="{{ route('posts.articles') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    Articles
                </a>
                <a href="{{ route('posts.videos') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    Vidéos
                </a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    À propos
                </a>
                {{-- <a href="{{ route('apropos.capturemedia') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-yellow-500 hover:bg-gray-50 dark:hover:bg-gray-800">
                    Propos sur Capture Media
                </a> --}}
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div 
        x-show="searchOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[999] flex items-center justify-center bg-black/40 backdrop-blur-sm"
        style="z-index:9999"
        @keydown.window.escape="searchOpen = false"
        @click="searchOpen = false"
        x-cloak
    >
        <div class="relative w-full max-w-md sm:max-w-lg mx-4 sm:mx-8" @click.stop>
            <button @click="searchOpen = false" class="absolute top-2 right-2 z-10 bg-white dark:bg-gray-800 rounded-full p-1 shadow hover:bg-yellow-100 dark:hover:bg-yellow-900 transition">
                <svg class="w-5 h-5 text-gray-500 hover:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-4 sm:p-6 border border-yellow-100 dark:border-yellow-900 w-full"
                 style="max-width: 85vw;">
                <form action="{{ route('search') }}" method="GET" class="flex flex-col gap-4">
                    <label class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-2"></label>
                    <div class="relative">
                        <input type="text" 
                               name="q" 
                               placeholder="Rechercher des articles, vidéos..." 
                               class="w-full px-4 py-3 pr-12 text-base sm:text-lg border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm"
                               x-ref="searchInput"
                               autofocus>
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-500 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Admin Login Modal -->
    <div 
        x-data="{ adminPassword: '', adminError: '' }"
        x-show="adminLoginOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[999] flex items-center justify-center bg-black/40 backdrop-blur-sm"
        style="z-index:9999"
        @keydown.window.escape="adminLoginOpen = false"
        @click="adminLoginOpen = false"
        x-cloak
    >
        <div class="relative w-full max-w-xs mx-4 sm:mx-8" @click.stop>
            <button @click="adminLoginOpen = false" class="absolute top-2 right-2 z-10 bg-white dark:bg-gray-800 rounded-full p-1 shadow hover:bg-yellow-100 dark:hover:bg-yellow-900 transition">
                <svg class="w-5 h-5 text-gray-500 hover:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-6 border border-yellow-100 dark:border-yellow-900 w-full"
                 style="max-width: 95vw;">
                <form @submit.prevent="
                    if(adminPassword === 'admin123') {
                        window.location.href = '{{ route('admin.dashboard') }}';
                    } else {
                        adminError = 'Mot de passe incorrect';
                    }
                " class="flex flex-col gap-4">
                    <label class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Mot de passe admin</label>
                    <input 
                        type="password" 
                        x-model="adminPassword"
                        placeholder="Mot de passe"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm"
                        autofocus
                    >
                    <template x-if="adminError">
                        <div class="text-red-500 text-sm" x-text="adminError"></div>
                    </template>
                    <button type="submit" class="w-full px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition">
                        Se connecter
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>