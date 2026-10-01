@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-[#1a5276] mb-4">Bienvenidos a ABCICO</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Asociación Boliviana de Cirugía de Columna</p>
    </div>

    <div class="relative rounded-2xl overflow-hidden shadow-xl mb-12" id="hero-carousel">
        <div class="carousel-slides relative h-[420px] md:h-[480px]">
            <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100" data-slide="0">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1600&q=80" alt="Historia ABCICO" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1a5276]/90 via-[#1a5276]/60 to-transparent"></div>
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-8 w-full">
                        <div class="max-w-lg text-white">
                            <h3 class="text-3xl md:text-4xl font-bold mb-3">Historia</h3>
                            <p class="text-lg text-blue-100 mb-6">Conoce nuestro recorrido, tradición y los hitos que han consolidado a ABCICO como referente en cirugía de columna.</p>
                            <a href="{{ route('association.history') }}" class="inline-block px-6 py-3 bg-white text-[#1a5276] font-semibold rounded-lg hover:bg-blue-50 transition-colors">Leer más →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-slide="1">
                <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1600&q=80" alt="Junta Directiva" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1a5276]/90 via-[#1a5276]/60 to-transparent"></div>
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-8 w-full">
                        <div class="max-w-lg text-white">
                            <h3 class="text-3xl md:text-4xl font-bold mb-3">Junta Directiva</h3>
                            <p class="text-lg text-blue-100 mb-6">Conoce a los profesionales que dirigen nuestra asociación durante el período 2025-2027.</p>
                            <a href="{{ route('association.board') }}" class="inline-block px-6 py-3 bg-white text-[#1a5276] font-semibold rounded-lg hover:bg-blue-50 transition-colors">Leer más →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-slide="2">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1600&q=80" alt="Estatutos" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1a5276]/90 via-[#1a5276]/60 to-transparent"></div>
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-8 w-full">
                        <div class="max-w-lg text-white">
                            <h3 class="text-3xl md:text-4xl font-bold mb-3">Estatutos</h3>
                            <p class="text-lg text-blue-100 mb-6">Revisa nuestras normas, denominación, objeto, categorías de miembros y directiva.</p>
                            <a href="{{ route('statutes.index') }}" class="inline-block px-6 py-3 bg-white text-[#1a5276] font-semibold rounded-lg hover:bg-blue-50 transition-colors">Leer más →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-slide="3">
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=1600&q=80" alt="Miembros" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1a5276]/90 via-[#1a5276]/60 to-transparent"></div>
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-8 w-full">
                        <div class="max-w-lg text-white">
                            <h3 class="text-3xl md:text-4xl font-bold mb-3">Miembros</h3>
                            <p class="text-lg text-blue-100 mb-6">Conoce a nuestros miembros fundadores y activos que hacen posible esta asociación.</p>
                            <a href="{{ route('members.index') }}" class="inline-block px-6 py-3 bg-white text-[#1a5276] font-semibold rounded-lg hover:bg-blue-50 transition-colors">Leer más →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="carousel-prev" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/40 transition-colors" aria-label="Anterior">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button type="button" id="carousel-next" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/40 transition-colors" aria-label="Siguiente">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2.5" id="carousel-dots">
            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-white transition-all duration-300" data-slide="0" aria-label="Slide 1"></button>
            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" data-slide="1" aria-label="Slide 2"></button>
            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" data-slide="2" aria-label="Slide 3"></button>
            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" data-slide="3" aria-label="Slide 4"></button>
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
