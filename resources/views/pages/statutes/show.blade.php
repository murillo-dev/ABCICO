@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-[#1a5276] mb-6">{{ $statute->title }}</h1>
        <div class="text-gray-700 leading-relaxed space-y-4">
            {!! nl2br(e($statute->content)) !!}
        </div>
    </div>
</div>
@endsection
