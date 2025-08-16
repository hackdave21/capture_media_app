<!-- Donation Button -->
<div x-data="{ 
    showDonation: false,
    copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform transition-all duration-300';
            toast.textContent = 'Numéro copié !';
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }, 2000);
        });
    }
}" class="fixed bottom-6 right-6 z-40">
    <!-- Coffee Icon Button -->
    <button @click="showDonation = true" 
            class="w-12 h-12 bg-yellow-500 hover:bg-yellow-400 text-black rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 group">
        <!-- Icône café SVG -->
        <svg class="w-7 h-7 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M17 8V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v8a5 5 0 0 0 5 5h2a5 5 0 0 0 5-5v-1m0 0h2a2 2 0 0 1 0 4h-2"/>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M6 1v2m6-2v2m-6 4v2m6-2v2"/>
        </svg>
    </button>

    <!-- Donation Modal -->
    <div x-show="showDonation" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 bg-black/50 flex items-center justify-center p-2"
         @click="showDonation = false"
         x-cloak>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-xs w-full p-4 relative"
             @click.stop>
            <!-- Header -->
            <div class="text-center mb-4">
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2,21V19H20V21H2M20,8V5L18,5V8A4,4 0 0,1 14,12A4,4 0 0,1 10,8V5H8V8A6,6 0 0,0 14,14A6,6 0 0,0 20,8M16,5V8A2,2 0 0,1 14,10A2,2 0 0,1 12,8V5H16Z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">
                    Soutenez Capture Media
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-xs">
                    Votre soutien nous aide à continuer notre mission d'information sur l'actualité africaine.
                </p>
            </div>

            <!-- Donation Options -->
            <div class="space-y-3">
                <div class="text-center mb-2">
                    <p class="text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Faire un don via Flooz et Mixx
                    </p>
                </div>
                <!-- Donation Numbers -->
                <div class="space-y-2">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-900 dark:text-white">Numéro 1</p>
                            <p class="text-base font-mono text-yellow-600 dark:text-yellow-400">+228 XX XX XX XX</p>
                        </div>
                        <button @click="copyToClipboard('+228 XX XX XX XX')" 
                                class="p-1 text-gray-500 hover:text-yellow-600 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-900 dark:text-white">Numéro 2</p>
                            <p class="text-base font-mono text-yellow-600 dark:text-yellow-400">+228 YY YY YY YY</p>
                        </div>
                        <button @click="copyToClipboard('+228 YY YY YY YY')" 
                                class="p-1 text-gray-500 hover:text-yellow-600 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Mix by Yas -->
                <div class="text-center pt-2 border-t border-gray-200 dark:border-gray-600">
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                         <span class="font-semibold text-yellow-600 dark:text-yellow-400"></span>
                    </p>
                </div>
                <!-- Close Button -->
                <button @click="showDonation = false" 
                        class="w-full mt-4 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200 text-sm">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>