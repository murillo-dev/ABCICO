@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-[#1a5276] mb-4">Bienvenidos a ABCICO</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Asociación Boliviana de Cirugía de Columna</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-[#1a5276]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Historia</h3>
            <p class="text-gray-600 text-sm">Conoce nuestro recorrido y tradición.</p>
            <a href="{{ route('association.history') }}" class="mt-3 inline-block text-[#1a5276] font-medium text-sm hover:underline">Leer más →</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-[#1a5276]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Junta Directiva</h3>
            <p class="text-gray-600 text-sm">Conoce a quienes nos dirigen 2025-2027.</p>
            <a href="{{ route('association.board') }}" class="mt-3 inline-block text-[#1a5276] font-medium text-sm hover:underline">Leer más →</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-[#1a5276]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Estatutos</h3>
            <p class="text-gray-600 text-sm">Revisa nuestras normas y regulaciones.</p>
            <a href="{{ route('statutes.index') }}" class="mt-3 inline-block text-[#1a5276] font-medium text-sm hover:underline">Leer más →</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-[#1a5276]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Miembros</h3>
            <p class="text-gray-600 text-sm">Conoce a nuestros miembros y fundadores.</p>
            <a href="{{ route('members.index') }}" class="mt-3 inline-block text-[#1a5276] font-medium text-sm hover:underline">Leer más →</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8 mb-8">
        <h2 class="text-2xl font-bold text-[#1a5276] mb-4">Últimos Estatutos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($statutes as $statute)
            <a href="{{ route('statutes.show', $statute) }}" class="block p-4 border border-gray-200 rounded-lg hover:border-[#1a5276] hover:bg-blue-50 transition">
                <h3 class="font-semibold text-[#1a5276]">{{ $statute->title }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ Str::limit($statute->content, 100) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
