<section class="bg-black dark:bg-yellow-500 py-16 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/20 to-transparent"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-yellow-400 dark:text-black mb-4">
                Capture Media en Chiffres
            </h2>
            <p class="text-gray-300 dark:text-gray-800 text-lg">
                Une plateforme d'actualité africaine de confiance
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Articles publiés -->
            <div class="text-center group" x-data="{ count: 2000 }" x-intersect="$el.scrollIntoView && (count = {{ $stats['articles'] ?? 54 }})">
                <div class="bg-yellow-500/10 dark:bg-black/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-yellow-400 dark:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-yellow-400 dark:text-black mb-2" x-text="count"></div>
                <div class="text-gray-300 dark:text-gray-800 font-medium">Articles publiés</div>
            </div>
            
            <!-- Pays couverts -->
            <div class="text-center group">
                <a href="{{ route('countries.index') }}" title="Voir tous les pays">
                    <div class="bg-yellow-500/10 dark:bg-black/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-yellow-400 dark:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 dark:text-black mb-2">
                         54+
                    </div>
                    <div class="text-gray-300 dark:text-gray-800 font-medium">Pays couverts</div>
                </a>
            </div>
            
            <!-- Lecteurs mensuels -->
            <div class="text-center group">
                <div class="bg-yellow-500/10 dark:bg-black/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-yellow-400 dark:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-yellow-400 dark:text-black mb-2">100K+</div>
                <div class="text-gray-300 dark:text-gray-800 font-medium">Lecteurs mensuels</div>
            </div>
            
            <!-- Actualité en continu -->
            <div class="text-center group">
                <div class="bg-yellow-500/10 dark:bg-black/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-yellow-400 dark:text-black animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-yellow-400 dark:text-black mb-2">24/7</div>
                <div class="text-gray-300 dark:text-gray-800 font-medium">Actualité en continu</div>
            </div>
        </div>
        
        <!-- Call to Action -->
        <div class="text-center mt-12">
            <a href="{{ route('posts.index') }}" 
               class="inline-flex items-center px-8 py-3 bg-yellow-500 hover:bg-yellow-400 dark:bg-black dark:hover:bg-gray-800 text-black dark:text-yellow-400 font-semibold rounded-lg transition-all duration-200 transform hover:scale-105">
                <span>Découvrir nos articles</span>
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>