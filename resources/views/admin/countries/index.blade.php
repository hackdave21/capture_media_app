@extends('layouts.app')

@section('title', 'Tous les pays couverts')
@section('meta_description', 'Découvrez tous les pays couverts par Capture Media.')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8 text-center">Tous les pays couverts</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($countries as $country)
            <a href="{{ route('countries.show', $country) }}" class="block bg-white dark:bg-gray-900 rounded-lg shadow p-4 text-center hover:bg-yellow-50 dark:hover:bg-yellow-900 transition">
                <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $country->name }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection
