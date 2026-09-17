@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-[#1a5276] mb-6">{{ $section->title }}</h1>
        <div class="text-gray-700 leading-relaxed space-y-4">
            {!! nl2br(e($section->content)) !!}
        </div>
    </div>

    @if($boardMembers->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-[#1a5276] mb-6">Junta Directiva 2025-2027</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($boardMembers as $member)
            <div class="bg-white rounded-lg shadow-md p-6 text-center border-t-4 border-t-[#1a5276]">
                @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                @else
                <div class="w-24 h-24 rounded-full bg-blue-200 mx-auto mb-4 flex items-center justify-center">
                    <span class="text-2xl font-bold text-[#1a5276]">{{ substr($member->name, 0, 1) }}</span>
                </div>
                @endif
                <h3 class="font-semibold text-lg text-gray-900">{{ $member->name }}</h3>
                <p class="text-[#1a5276] text-sm font-medium">{{ $member->position }}</p>
                @if($member->description)
                <p class="text-gray-600 text-sm mt-2">{{ $member->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
