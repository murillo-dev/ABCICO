@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-[#1a5276] mb-2">Hacete Miembro</h1>
        <p class="text-gray-500 mb-8">Completa el formulario para unirte a ABCICO</p>

        <form action="{{ route('members.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a5276] focus:border-[#1a5276] outline-none transition">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a5276] focus:border-[#1a5276] outline-none transition">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="membership_type" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Membresía</label>
                <select name="membership_type" id="membership_type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a5276] focus:border-[#1a5276] outline-none transition">
                    <option value="regular">Miembro Regular</option>
                    <option value="honorary">Miembro Honorario</option>
                    <option value="founder">Miembro Fundador</option>
                </select>
                @error('membership_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="flex items-start">
                    <input type="checkbox" name="accept_terms" required class="mt-1 mr-2">
                    <span class="text-sm text-gray-600">Acepto los términos y condiciones de la asociación</span>
                </label>
                @error('accept_terms')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-[#1a5276] text-white py-3 px-4 rounded-lg hover:bg-[#154360] transition font-semibold">
                    Enviar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
