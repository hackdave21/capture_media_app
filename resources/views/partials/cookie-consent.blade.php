<!-- Cookie Consent Banner -->
<div x-data="{ 
    showCookies: !localStorage.getItem('cookieConsent'),
    acceptCookies() {
        localStorage.setItem('cookieConsent', 'accepted');
        this.showCookies = false;
    },
    rejectCookies() {
        localStorage.setItem('cookieConsent', 'rejected');
        this.showCookies = false;
    }
}" 
x-show="showCookies" 
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0 transform translate-y-full"
x-transition:enter-end="opacity-100 transform translate-y-0"
x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100 transform translate-y-0"
x-transition:leave-end="opacity-0 transform translate-y-full"
class="fixed bottom-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 shadow-2xl"
x-cloak>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 mt-1">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">
                        Gestion des cookies
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Nous utilisons des cookies pour améliorer votre expérience de navigation, analyser le trafic du site et personnaliser le contenu. 
                        <a href="#" class="text-yellow-600 dark:text-yellow-400 hover:underline">En savoir plus</a>
                    </p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3 flex-shrink-0">
                <button @click="rejectCookies()" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors duration-200">
                    Refuser
                </button>
                <button @click="acceptCookies()" 
                        class="px-4 py-2 text-sm font-medium text-black bg-yellow-500 hover:bg-yellow-400 rounded-lg transition-colors duration-200">
                    Accepter
                </button>
            </div>
        </div>
    </div>
</div>