@extends('layouts.app')

@section('title', 'Gérer les auteurs')

@section('content')
<div class="max-w-3xl mx-auto py-12">
    <div class="mb-8">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-yellow-500 font-semibold">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Retour à l'administration
        </a>
    </div>
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Gestion des auteurs</h1>
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 mb-10">
        <form action="{{ route('admin.authors.store') }}" method="POST" class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 items-center">
            @csrf
            <input type="text" name="name" class="flex-1 border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Nom de l'auteur" required>
            <input type="email" name="email" class="flex-1 border border-gray-300 dark:border-gray-700 rounded-lg p-3 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Email" required>
            <button type="submit" class="px-6 py-3 bg-green-500 hover:bg-green-400 text-white font-semibold rounded-lg transition-all duration-200">
                Ajouter
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-900 rounded-xl shadow divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($authors as $author)
                <tr>
                    <td class="px-6 py-4 text-gray-900 dark:text-white font-semibold">{{ $author->name }}</td>
                    <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $author->email }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet auteur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-400 text-white rounded transition-all text-xs font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if(count($authors) === 0)
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-400">Aucun auteur enregistré.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
