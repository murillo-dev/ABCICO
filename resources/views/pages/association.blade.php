@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-[#1a5276] mb-8">La Asociación</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sections as $section)
        <a href="{{ route('association.show', $section->type) }}" class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow border-l-4 border-l-[#1a5276]">
            <h2 class="text-xl font-bold text-[#1a5276] mb-2">{{ $section->title }}</h2>
            <p class="text-gray-600 text-sm">{{ Str::limit($section->content, 150) }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection
