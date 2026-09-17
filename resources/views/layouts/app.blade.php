<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ABCICO') }} - Asociación Boliviana de Cirugía de Columna</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <nav class="bg-white shadow-md sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <span class="text-3xl font-bold text-[#1a5276]">ABCICO</span>
                    </a>
                    <span class="hidden md:inline text-sm text-gray-500 ml-2 mt-2">Asociación Boliviana de Cirugía de Columna</span>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 transition">Inicio</a>
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 transition flex items-center">
                            La Asociación <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('association.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Historia</a>
                                <a href="{{ route('association.who-we-are') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Quiénes Somos</a>
                                <a href="{{ route('association.mission') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Misión</a>
                                <a href="{{ route('association.vision') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Visión</a>
                                <a href="{{ route('association.objectives') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Objetivos</a>
                                <a href="{{ route('association.board') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Junta Directiva 2025-2027</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 transition flex items-center">
                            Estatutos <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('statutes.denomination') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Denominación</a>
                                <a href="{{ route('statutes.object') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Objeto</a>
                                <a href="{{ route('statutes.categories') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Categoría de Miembros</a>
                                <a href="{{ route('statutes.directiva') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Directiva</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('members.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 transition">Miembros</a>
                    <a href="{{ route('members.become') }}" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-[#1a5276] hover:bg-[#154360] transition">Hacete Miembro</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#1a5276] hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100">Inicio</a>
                <details class="group">
                    <summary class="px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 cursor-pointer">La Asociación</summary>
                    <div class="pl-4 space-y-1">
                        <a href="{{ route('association.history') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Historia</a>
                        <a href="{{ route('association.who-we-are') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Quiénes Somos</a>
                        <a href="{{ route('association.mission') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Misión</a>
                        <a href="{{ route('association.vision') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Visión</a>
                        <a href="{{ route('association.objectives') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Objetivos</a>
                        <a href="{{ route('association.board') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Junta Directiva 2025-2027</a>
                    </div>
                </details>
                <details class="group">
                    <summary class="px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100 cursor-pointer">Estatutos</summary>
                    <div class="pl-4 space-y-1">
                        <a href="{{ route('statutes.denomination') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Denominación</a>
                        <a href="{{ route('statutes.object') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Objeto</a>
                        <a href="{{ route('statutes.categories') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Categoría de Miembros</a>
                        <a href="{{ route('statutes.directiva') }}" class="block py-2 text-sm text-gray-600 hover:text-[#1a5276]">Directiva</a>
                    </div>
                </details>
                <a href="{{ route('members.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1a5276] hover:bg-gray-100">Miembros</a>
                <a href="{{ route('members.become') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#1a5276] text-center">Hacete Miembro</a>
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @if(session('status'))
            <div class="max-w-7xl mx-auto mt-4 px-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="max-w-7xl mx-auto mt-4 px-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-[#1a5276] text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <h3 class="text-xl font-bold mb-2">ABCICO</h3>
                    <p class="text-blue-200 text-sm">Asociación Boliviana de Cirugía de Columna</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">La Asociación</h4>
                    <ul class="space-y-1 text-blue-200 text-sm">
                        <li><a href="{{ route('association.history') }}" class="hover:text-white transition">Historia</a></li>
                        <li><a href="{{ route('association.who-we-are') }}" class="hover:text-white transition">Quiénes Somos</a></li>
                        <li><a href="{{ route('association.mission') }}" class="hover:text-white transition">Misión</a></li>
                        <li><a href="{{ route('association.vision') }}" class="hover:text-white transition">Visión</a></li>
                        <li><a href="{{ route('association.objectives') }}" class="hover:text-white transition">Objetivos</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Estatutos</h4>
                    <ul class="space-y-1 text-blue-200 text-sm">
                        <li><a href="{{ route('statutes.denomination') }}" class="hover:text-white transition">Denominación</a></li>
                        <li><a href="{{ route('statutes.object') }}" class="hover:text-white transition">Objeto</a></li>
                        <li><a href="{{ route('statutes.categories') }}" class="hover:text-white transition">Categoría de Miembros</a></li>
                        <li><a href="{{ route('statutes.directiva') }}" class="hover:text-white transition">Directiva</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Miembros</h4>
                    <ul class="space-y-1 text-blue-200 text-sm">
                        <li><a href="{{ route('members.index') }}" class="hover:text-white transition">Nuestros Miembros</a></li>
                        <li><a href="{{ route('members.become') }}" class="hover:text-white transition">Hacete Miembro</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blue-700 mt-8 pt-4 text-center text-blue-300 text-sm">
                <p>&copy; {{ now()->year }} ABCICO - Asociación Boliviana de Cirugía de Columna. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    @section('scripts')
        <script>
            document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>
    @endsection
</body>
</html>
