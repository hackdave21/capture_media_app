@extends('layouts.app')

@section('title', 'Gestion des sponsors')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-2 sm:px-4">
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-yellow-500 font-semibold">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Retour admin
        </a>
    </div>
    <h1 class="text-2xl md:text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Gestion des sponsors</h1>
    <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data" class="mb-10 flex flex-col sm:flex-row items-center gap-4 bg-white dark:bg-gray-900 rounded-xl shadow p-6">
        @csrf
        <input type="text" name="name" class="flex-1 border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Nom du sponsor" required>
        <input type="file" name="photo" class="flex-1 border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
        <button type="submit" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg transition-all duration-200">
            Ajouter
        </button>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($sponsors as $sponsor)
            <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 flex flex-col items-center group transition-all duration-200 hover:-translate-y-1 hover:shadow-2xl">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-yellow-400 shadow mb-3 bg-gray-50 dark:bg-gray-800 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" class="object-contain w-full h-full transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="font-semibold text-lg text-gray-900 dark:text-white mb-2 text-center">{{ $sponsor->name }}</div>
                <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-400 text-white rounded transition-all text-xs font-semibold">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
