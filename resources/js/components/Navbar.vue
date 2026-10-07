<script setup lang="ts">
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { home, login, register, logout } from '@/routes';
import type { User } from '@/types';

const page = usePage();
const user = computed<User | null>(
    () => (page.props.auth?.user as User | null) ?? null,
);
const appName = computed<string>(() => (page.props.name as string) || 'Abcico');

const mobileMenuOpen = ref(false);

const guestNavLinks = [
    { name: 'Inicio', href: home.url() },
    { name: 'Servicios', href: '#servicios' },
    { name: 'Nosotros', href: '#nosotros' },
    { name: 'Contacto', href: '#contacto' },
];

const authNavLinks = [
    { name: 'Inicio', href: home.url(), active: true },
    { name: 'Panel', href: '#panel', badge: 'Activo' },
    { name: 'Proyectos', href: '#proyectos' },
    { name: 'Reportes', href: '#reportes' },
    { name: 'Configuración', href: '#configuracion' },
];

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
}
</script>

<template>
    <header
        class="sticky top-0 z-50 w-full border-b border-neutral-200/80 bg-white/80 backdrop-blur-md dark:border-neutral-800/80 dark:bg-neutral-950/80"
    >
        <div
            class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8"
        >
            <!-- Brand Logo -->
            <div class="flex items-center gap-8">
                <Link
                    :href="home.url()"
                    class="group flex items-center gap-2.5 transition"
                >
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-xs transition group-hover:scale-105 dark:bg-white dark:text-neutral-950"
                    >
                        <svg
                            class="h-4 w-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <polygon points="12 2 2 7 12 12 22 7 12 2" />
                            <polyline points="2 17 12 22 22 17" />
                            <polyline points="2 12 12 17 22 12" />
                        </svg>
                    </span>
                    <span
                        class="text-base font-semibold tracking-tight text-neutral-900 dark:text-white"
                    >
                        {{ appName }}
                    </span>
                </Link>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden items-center gap-1 md:flex">
                    <!-- Guest Links -->
                    <template v-if="!user">
                        <a
                            v-for="link in guestNavLinks"
                            :key="link.name"
                            :href="link.href"
                            class="rounded-md px-3 py-1.5 text-sm font-medium text-neutral-600 transition hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-900 dark:hover:text-white"
                        >
                            {{ link.name }}
                        </a>
                    </template>

                    <!-- Authenticated Links (Extended Menu) -->
                    <template v-else>
                        <div class="flex items-center gap-1">
                            <a
                                v-for="link in authNavLinks"
                                :key="link.name"
                                :href="link.href"
                                class="inline-flex items-center gap-1.5 rounded-md px-3 py-1.5 text-sm font-medium transition"
                                :class="
                                    link.active
                                        ? 'bg-neutral-100 text-neutral-900 dark:bg-neutral-800 dark:text-white'
                                        : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-900 dark:hover:text-white'
                                "
                            >
                                <span>{{ link.name }}</span>
                                <span
                                    v-if="link.badge"
                                    class="rounded-full bg-emerald-500/10 px-1.5 py-0.5 text-[10px] font-semibold text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400"
                                >
                                    {{ link.badge }}
                                </span>
                            </a>
                        </div>
                    </template>
                </nav>
            </div>

            <!-- Right Actions -->
            <div class="hidden items-center gap-3 md:flex">
                <!-- Guest Actions -->
                <template v-if="!user">
                    <Link
                        :href="login.url()"
                        class="inline-flex items-center justify-center rounded-full border border-neutral-300 bg-white px-4 py-1.5 text-sm font-medium text-neutral-800 shadow-2xs transition hover:border-neutral-400 hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-200 dark:hover:border-neutral-600 dark:hover:bg-neutral-800"
                    >
                        Iniciar sesión
                    </Link>
                    <Link
                        :href="register.url()"
                        class="inline-flex items-center justify-center rounded-full bg-neutral-900 px-4 py-1.5 text-sm font-medium text-white shadow-2xs transition hover:bg-neutral-800 dark:bg-white dark:text-neutral-950 dark:hover:bg-neutral-100"
                    >
                        Registrarse
                    </Link>
                </template>

                <!-- Authenticated Actions -->
                <template v-else>
                    <div
                        class="flex items-center gap-3 border-l border-neutral-200 pl-4 dark:border-neutral-800"
                    >
                        <div class="flex items-center gap-2">
                            <span
                                class="flex h-7 w-7 items-center justify-center rounded-full bg-neutral-200 text-xs font-semibold text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200"
                            >
                                {{ user.name.charAt(0).toUpperCase() }}
                            </span>
                            <span
                                class="text-xs font-medium text-neutral-700 dark:text-neutral-300"
                            >
                                {{ user.name }}
                            </span>
                        </div>

                        <Link
                            :href="logout.url()"
                            method="post"
                            as="button"
                            class="inline-flex cursor-pointer items-center gap-1 rounded-md px-2.5 py-1 text-xs font-medium text-neutral-500 transition hover:bg-red-50 hover:text-red-600 dark:text-neutral-400 dark:hover:bg-red-950/30 dark:hover:text-red-400"
                        >
                            <svg
                                class="h-3.5 w-3.5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                            <span>Salir</span>
                        </Link>
                    </div>
                </template>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden">
                <button
                    type="button"
                    @click="toggleMobileMenu"
                    class="inline-flex items-center justify-center rounded-md p-2 text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 focus:outline-hidden dark:text-neutral-400 dark:hover:bg-neutral-900 dark:hover:text-white"
                    aria-label="Abrir menú"
                >
                    <svg
                        v-if="!mobileMenuOpen"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                    <svg
                        v-else
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div
            v-show="mobileMenuOpen"
            class="border-b border-neutral-200 bg-white px-4 pt-2 pb-4 md:hidden dark:border-neutral-800 dark:bg-neutral-950"
        >
            <div class="flex flex-col gap-1">
                <!-- Guest Mobile Links -->
                <template v-if="!user">
                    <a
                        v-for="link in guestNavLinks"
                        :key="link.name"
                        :href="link.href"
                        @click="mobileMenuOpen = false"
                        class="rounded-md px-3 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-900"
                    >
                        {{ link.name }}
                    </a>
                    <div
                        class="mt-3 flex flex-col gap-2 border-t border-neutral-100 pt-3 dark:border-neutral-900"
                    >
                        <Link
                            :href="login.url()"
                            @click="mobileMenuOpen = false"
                            class="flex w-full items-center justify-center rounded-md border border-neutral-300 bg-white py-2 text-sm font-medium text-neutral-800 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-200"
                        >
                            Iniciar sesión
                        </Link>
                        <Link
                            :href="register.url()"
                            @click="mobileMenuOpen = false"
                            class="flex w-full items-center justify-center rounded-md bg-neutral-900 py-2 text-sm font-medium text-white dark:bg-white dark:text-neutral-950"
                        >
                            Registrarse
                        </Link>
                    </div>
                </template>

                <!-- Authenticated Mobile Links (Extended Menu) -->
                <template v-else>
                    <div
                        class="mb-2 flex items-center justify-between rounded-md bg-neutral-100 p-2.5 dark:bg-neutral-900"
                    >
                        <div class="flex items-center gap-2">
                            <span
                                class="flex h-7 w-7 items-center justify-center rounded-full bg-neutral-300 text-xs font-semibold dark:bg-neutral-700"
                            >
                                {{ user.name.charAt(0).toUpperCase() }}
                            </span>
                            <div class="flex flex-col">
                                <span
                                    class="text-xs font-medium text-neutral-900 dark:text-white"
                                    >{{ user.name }}</span
                                >
                                <span
                                    class="text-[11px] text-neutral-500 dark:text-neutral-400"
                                    >{{ user.email }}</span
                                >
                            </div>
                        </div>
                    </div>

                    <a
                        v-for="link in authNavLinks"
                        :key="link.name"
                        :href="link.href"
                        @click="mobileMenuOpen = false"
                        class="flex items-center justify-between rounded-md px-3 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-900"
                    >
                        <span>{{ link.name }}</span>
                        <span
                            v-if="link.badge"
                            class="rounded-full bg-emerald-500/10 px-1.5 py-0.5 text-[10px] font-semibold text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400"
                        >
                            {{ link.badge }}
                        </span>
                    </a>

                    <div
                        class="mt-3 border-t border-neutral-100 pt-3 dark:border-neutral-900"
                    >
                        <Link
                            :href="logout.url()"
                            method="post"
                            as="button"
                            @click="mobileMenuOpen = false"
                            class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-md bg-red-50 py-2 text-sm font-medium text-red-600 transition dark:bg-red-950/30 dark:text-red-400"
                        >
                            Cerrar sesión
                        </Link>
                    </div>
                </template>
            </div>
        </div>
    </header>
</template>
