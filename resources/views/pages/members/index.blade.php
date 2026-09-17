@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-[#1a5276] mb-8">Miembros</h1>

    <div class="mb-8 flex flex-wrap gap-4 items-center justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Fundadores</h2>
            <p class="text-gray-500 text-sm">Los miembros fundadores de ABCICO</p>
        </div>
        <a href="{{ route('members.become') }}" class="px-5 py-2 bg-[#1a5276] text-white rounded-lg hover:bg-[#154360] transition font-medium">
            Hacete Miembro
        </a>
    </div>

    @if($founders->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        @foreach($founders as $founder)
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            @if($founder->image)
            <img src="{{ asset('storage/' . $founder->image) }}" alt="{{ $founder->name }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
            @else
            <div class="w-24 h-24 rounded-full bg-blue-200 mx-auto mb-4 flex items-center justify-center">
                <span class="text-2xl font-bold text-[#1a5276]">{{ substr($founder->name, 0, 1) }}</span>
            </div>
            @endif
            <h3 class="font-semibold text-lg text-gray-900">{{ $founder->name }}</h3>
            @if($founder->role)
            <p class="text-[#1a5276] text-sm">{{ $founder->role }}</p>
            @endif
            @if($founder->description)
            <p class="text-gray-600 text-sm mt-2">{{ $founder->description }}</p>
            @endif
            @if($founder->user)
            <a href="mailto:{{ $founder->user->email }}" class="mt-3 inline-block text-sm text-[#1a5276] hover:underline">{{ $founder->user->email }}</a>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-12 text-center mb-12">
        <p class="text-gray-500 text-lg">No hay miembros fundadores registrados aún.</p>
    </div>
    @endif

    <div>
        <h2 class="text-2xl font-bold text-[#1a5276] mb-6">Miembros Activos</h2>
        @if($members->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($members as $member)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center mr-4">
                        <span class="font-bold text-[#1a5276]">{{ substr($member->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $member->user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $member->user->email }}</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-2">
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                        {{ ucfirst($member->membership_type) }}
                    </span>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                        {{ ucfirst($member->status) }}
                    </span>
                </div>
                <p class="text-sm text-gray-400 mt-2">Miembro desde {{ $member->joined_at->format('M Y') }}</p>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <p class="text-gray-500">No hay miembros activos registrados.</p>
        </div>
        @endif
    </div>
</div>
@endsection
