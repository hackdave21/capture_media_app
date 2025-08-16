<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Capture Media - Actualité Africaine')</title>
    <meta name="description" content="@yield('meta_description', 'Votre source d\'actualité africaine de référence. Politique, économie, santé, culture - Restez informé 24/7.')">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Capture Media - Actualité Africaine')">
    <meta property="og:description" content="@yield('og_description', 'Votre source d\'actualité africaine de référence. Politique, économie, santé, culture - Restez informé 24/7.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Capture Media">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Capture Media - Actualité Africaine')">
    <meta name="twitter:description" content="@yield('og_description', 'Votre source d\'actualité africaine de référence.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    <!-- Favicon personnalisé -->
    <link rel="icon" type="image/png" href="{{ asset('IMG_0016.JPG') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('meta')
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-montserrat bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
    <!-- Navigation -->
    @include('partials.navigation')
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    <!-- Stats Section -->
    @include('partials.stats')
    <!-- Footer -->
    @include('partials.footer')
    <!-- Cookie Consent -->
    @include('partials.cookie-consent')
    <!-- Donation Button -->
    @include('partials.donation-button')
    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('scripts')
</body>
</html>