
@extends('layouts.app')

@section('title', 'Propos sur Capture Media')
@section('meta_description', 'Découvrez la vision, la mission, les valeurs et les réseaux de Capture Media, média africain basé à Dakar.')

@section('content')
<section class="bg-gradient-to-br from-yellow-50 via-white to-yellow-100 dark:from-yellow-900 dark:via-gray-900 dark:to-yellow-900 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/3 flex justify-center mb-8 md:mb-0">
                <img src="{{ asset('IMG_0016.JPG') }}" alt="Logo Capture Media" class="w-44 h-44 rounded-3xl border-4 border-yellow-400 shadow-xl object-cover">
            </div>
            <div class="md:w-2/3">
                <h1 class="text-4xl md:text-5xl font-extrabold text-yellow-600 dark:text-yellow-400 mb-4">Propos sur Capture Media</h1>
                <p class="text-lg text-gray-700 dark:text-gray-200 mb-4">
                    <span class="font-semibold text-yellow-500">Capture Media</span> est un média africain indépendant basé à Dakar, Sénégal, qui vise à :
                </p>
                <ul class="list-disc pl-6 text-gray-800 dark:text-gray-300 mb-6">
                    <li>Informer sur l’actualité africaine avec rigueur et passion</li>
                    <li>Promouvoir la diversité, l’innovation et l’entrepreneuriat africain</li>
                    <li>Mettre en lumière les talents et initiatives positives du continent</li>
                    <li>Créer une communauté engagée autour de l’Afrique et de ses diasporas</li>
                </ul>
                <div class="flex items-center space-x-6 mt-6">
                    <a href="https://www.instagram.com/cap.ture.media?igsh=MXdncnd1b25pZTM4cg%3D%3D&utm_source=qr" target="_blank" class="text-pink-600 hover:text-pink-400" title="Instagram">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com/@capture.media0?_t=ZM-8xTAWNfnRlF&_r=1" target="_blank" class="text-black hover:text-gray-700 dark:text-white dark:hover:text-yellow-400" title="TikTok">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/share/1AacLUBLTi/?mibextid=wwXIfr" target="_blank" class="text-blue-700 hover:text-blue-500" title="Facebook">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
                <div class="mt-8">
                    <span class="inline-block px-4 py-2 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full font-semibold text-sm">
                        Basé à Dakar, Sénégal & ouvert sur toute l'Afrique
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
