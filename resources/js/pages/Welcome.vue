<script setup lang="ts">
import { computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import { login, register, logout } from '@/routes';
import type { User } from '@/types';

const page = usePage();
const user = computed<User | null>(
    () => (page.props.auth?.user as User | null) ?? null,
);
const appName = computed<string>(() => (page.props.name as string) || 'Abcico');

const modules = [
    {
        title: 'Panel',
        description:
            'Visualización general de indicadores, métricas operativas y estado en tiempo real.',
        tag: 'Habilitado',
        icon: 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z',
    },
    {
        title: 'Proyectos',
        description:
            'Organización de flujos de trabajo, tareas clave y seguimiento de objetivos.',
        tag: 'Habilitado',
        icon: 'M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z',
    },
    {
        title: 'Reportes',
        description:
            'Generación de informes detallados y exportación de datos relevantes.',
        tag: 'Próximamente',
        icon: 'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z',
    },
    {
        title: 'Configuración',
        description:
            'Personalización de preferencias de cuenta, seguridad e integraciones.',
        tag: 'Próximamente',
        icon: 'M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281Z',
    },
];
</script>

<template>
    <div
        class="flex min-h-screen flex-col bg-neutral-50/50 text-neutral-900 antialiased dark:bg-neutral-950 dark:text-neutral-100"
    >
        <Head :title="user ? 'Panel Principal' : 'Bienvenido'" />

        <!-- Minimalist Navbar -->
        <Navbar />

        <main class="flex-1">
            <!-- ============================================== -->
            <!-- VISTA PARA USUARIOS NO AUTENTICADOS (GUEST)     -->
            <!-- Página de presentación simple                 -->
            <!-- ============================================== -->
            <template v-if="!user">
                <!-- Hero Presentation Section -->
                <section
                    class="relative overflow-hidden py-20 sm:py-28 lg:py-32"
                >
                    <div
                        class="mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8"
                    >
                        <!-- Subtle Pill Badge -->
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-neutral-200 bg-white px-3.5 py-1 text-xs font-medium text-neutral-700 shadow-2xs dark:border-neutral-800 dark:bg-neutral-900 dark:text-neutral-300"
                        >
                            <span
                                class="flex h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-500"
                            ></span>
                            <span>Diseño Minimalista & Modular</span>
                        </div>

                        <!-- Main Heading -->
                        <h1
                            class="mt-6 text-4xl font-semibold tracking-tight text-neutral-950 sm:text-5xl lg:text-6xl dark:text-white"
                        >
                            Claridad y simplicidad para
                            <br class="hidden sm:inline" />
                            <span class="text-neutral-500 dark:text-neutral-400"
                                >tus proyectos y herramientas.</span
                            >
                        </h1>

                        <!-- Subtitle -->
                        <p
                            class="mx-auto mt-6 max-w-2xl text-base leading-relaxed text-neutral-600 sm:text-lg dark:text-neutral-400"
                        >
                            Una interfaz limpia e intuitiva diseñada para
                            trabajar sin distracciones. Inicia sesión para
                            descubrir las opciones ampliadas de nuestro menú.
                        </p>

                        <!-- Actions -->
                        <div
                            class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row"
                        >
                            <Link
                                :href="login.url()"
                                class="inline-flex w-full items-center justify-center rounded-full bg-neutral-900 px-6 py-3 text-sm font-medium text-white shadow-xs transition hover:bg-neutral-800 sm:w-auto dark:bg-white dark:text-neutral-950 dark:hover:bg-neutral-100"
                            >
                                Iniciar sesión
                                <svg
                                    class="ml-2 h-4 w-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline
                                        points="12 5 19 12 12 19"
                                    ></polyline>
                                </svg>
                            </Link>

                            <Link
                                :href="register.url()"
                                class="inline-flex w-full items-center justify-center rounded-full border border-neutral-300 bg-white px-6 py-3 text-sm font-medium text-neutral-800 shadow-2xs transition hover:border-neutral-400 hover:bg-neutral-50 sm:w-auto dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-200 dark:hover:border-neutral-600 dark:hover:bg-neutral-800"
                            >
                                Crear una cuenta
                            </Link>
                        </div>

                        <!-- Quick Demo Banner -->
                        <div
                            class="mx-auto mt-12 max-w-md rounded-xl border border-neutral-200/80 bg-white/70 p-4 text-xs shadow-xs backdrop-blur-sm dark:border-neutral-800/80 dark:bg-neutral-900/70"
                        >
                            <p
                                class="font-medium text-neutral-800 dark:text-neutral-200"
                            >
                                🔑 Cuenta de prueba lista para usar:
                            </p>
                            <p
                                class="mt-1 font-mono text-[11px] text-neutral-500 dark:text-neutral-400"
                            >
                                Email:
                                <span class="text-neutral-900 dark:text-white"
                                    >test@example.com</span
                                >
                                &nbsp;·&nbsp; Contraseña:
                                <span class="text-neutral-900 dark:text-white"
                                    >password</span
                                >
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Simple Presentation Features Section -->
                <section
                    id="servicios"
                    class="border-t border-neutral-200/80 bg-white py-16 dark:border-neutral-800/80 dark:bg-neutral-900/50"
                >
                    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h2
                                class="text-xs font-semibold tracking-wider text-neutral-500 uppercase dark:text-neutral-400"
                            >
                                Características principales
                            </h2>
                            <p
                                class="mt-2 text-2xl font-bold tracking-tight text-neutral-900 sm:text-3xl dark:text-white"
                            >
                                Todo lo que necesitas, nada de lo que sobra
                            </p>
                        </div>

                        <div
                            class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3"
                        >
                            <!-- Feature 1 -->
                            <div
                                class="flex flex-col rounded-2xl border border-neutral-200/90 bg-neutral-50/50 p-6 transition hover:border-neutral-300 dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                            >
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white dark:bg-white dark:text-neutral-950"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <rect
                                            x="3"
                                            y="3"
                                            width="18"
                                            height="18"
                                            rx="2"
                                            ry="2"
                                        ></rect>
                                        <line
                                            x1="3"
                                            y1="9"
                                            x2="21"
                                            y2="9"
                                        ></line>
                                        <line
                                            x1="9"
                                            y1="21"
                                            x2="9"
                                            y2="9"
                                        ></line>
                                    </svg>
                                </div>
                                <h3
                                    class="mt-4 text-base font-semibold text-neutral-900 dark:text-white"
                                >
                                    Menú Minimalista
                                </h3>
                                <p
                                    class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
                                >
                                    Navegación limpia que se expande
                                    dinámicamente con nuevas opciones una vez
                                    que inicias sesión.
                                </p>
                            </div>

                            <!-- Feature 2 -->
                            <div
                                class="flex flex-col rounded-2xl border border-neutral-200/90 bg-neutral-50/50 p-6 transition hover:border-neutral-300 dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                            >
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white dark:bg-white dark:text-neutral-950"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <rect
                                            x="3"
                                            y="11"
                                            width="18"
                                            height="11"
                                            rx="2"
                                            ry="2"
                                        ></rect>
                                        <path
                                            d="M7 11V7a5 5 0 0 1 10 0v4"
                                        ></path>
                                    </svg>
                                </div>
                                <h3
                                    class="mt-4 text-base font-semibold text-neutral-900 dark:text-white"
                                >
                                    Autenticación Segura
                                </h3>
                                <p
                                    class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
                                >
                                    Control de sesiones rápido y seguro
                                    impulsado por Laravel e Inertia.js para
                                    proteger tu espacio de trabajo.
                                </p>
                            </div>

                            <!-- Feature 3 -->
                            <div
                                class="flex flex-col rounded-2xl border border-neutral-200/90 bg-neutral-50/50 p-6 transition hover:border-neutral-300 dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                            >
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-neutral-900 text-white dark:bg-white dark:text-neutral-950"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                                        ></polygon>
                                    </svg>
                                </div>
                                <h3
                                    class="mt-4 text-base font-semibold text-neutral-900 dark:text-white"
                                >
                                    Modular y Adaptable
                                </h3>
                                <p
                                    class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
                                >
                                    Estructura preparada para adicionar
                                    fácilmente más módulos, vistas y
                                    características personalizadas.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </template>

            <!-- ============================================== -->
            <!-- VISTA PARA USUARIOS AUTENTICADOS (LOGGED IN)   -->
            <!-- Muestra el menú ampliado y estado de sesión     -->
            <!-- ============================================== -->
            <template v-else>
                <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
                    <!-- Welcome Hero Header -->
                    <div
                        class="rounded-2xl border border-neutral-200/80 bg-white p-6 shadow-xs sm:p-8 dark:border-neutral-800 dark:bg-neutral-900"
                    >
                        <div
                            class="flex flex-col justify-between gap-4 md:flex-row md:items-center"
                        >
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-400"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-emerald-500"
                                        ></span>
                                        Sesión Activa
                                    </span>
                                    <span class="text-xs text-neutral-400"
                                        >·</span
                                    >
                                    <span
                                        class="text-xs text-neutral-500 dark:text-neutral-400"
                                        >Menú extendido disponible</span
                                    >
                                </div>
                                <h1
                                    class="mt-2 text-2xl font-bold tracking-tight text-neutral-950 sm:text-3xl dark:text-white"
                                >
                                    Bienvenido de nuevo, {{ user.name }}
                                </h1>
                                <p
                                    class="mt-1 text-sm text-neutral-500 dark:text-neutral-400"
                                >
                                    Has iniciado sesión correctamente como
                                    <span
                                        class="font-mono text-neutral-700 dark:text-neutral-300"
                                        >{{ user.email }}</span
                                    >.
                                </p>
                            </div>

                            <div class="flex items-center gap-3">
                                <Link
                                    :href="logout.url()"
                                    method="post"
                                    as="button"
                                    class="inline-flex cursor-pointer items-center gap-1.5 rounded-lg border border-neutral-200 bg-white px-3.5 py-2 text-xs font-medium text-neutral-700 shadow-2xs transition hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700"
                                >
                                    <svg
                                        class="h-3.5 w-3.5 text-neutral-500"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                        />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" y1="12" x2="9" y2="12" />
                                    </svg>
                                    Cerrar sesión
                                </Link>
                            </div>
                        </div>

                        <!-- Info Banner about the extended menu -->
                        <div
                            class="mt-6 rounded-xl border border-neutral-200/60 bg-neutral-50 p-4 dark:border-neutral-800/60 dark:bg-neutral-950/50"
                        >
                            <div class="flex items-start gap-3">
                                <span
                                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-neutral-900 text-xs text-white dark:bg-white dark:text-neutral-950"
                                >
                                    ✓
                                </span>
                                <div>
                                    <h2
                                        class="text-xs font-semibold text-neutral-900 dark:text-white"
                                    >
                                        Nuevas opciones visibles en el menú de
                                        navegación:
                                    </h2>
                                    <p
                                        class="mt-1 text-xs leading-relaxed text-neutral-600 dark:text-neutral-400"
                                    >
                                        Como estás logueado, ahora puedes ver
                                        las opciones adicionales en la barra
                                        superior:
                                        <strong
                                            class="text-neutral-900 dark:text-white"
                                            >Panel</strong
                                        >,
                                        <strong
                                            class="text-neutral-900 dark:text-white"
                                            >Proyectos</strong
                                        >,
                                        <strong
                                            class="text-neutral-900 dark:text-white"
                                            >Reportes</strong
                                        >
                                        y
                                        <strong
                                            class="text-neutral-900 dark:text-white"
                                            >Configuración</strong
                                        >. Están preparadas para que adicionemos
                                        sus vistas correspondientes a
                                        continuación.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid of modules ready to be expanded -->
                    <div class="mt-8">
                        <div class="flex items-center justify-between">
                            <h2
                                class="text-sm font-semibold text-neutral-900 dark:text-white"
                            >
                                Módulos del Sistema
                            </h2>
                            <span class="text-xs text-neutral-400"
                                >Opciones listas para expandir</span
                            >
                        </div>

                        <div
                            class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"
                        >
                            <div
                                v-for="mod in modules"
                                :key="mod.title"
                                class="flex flex-col justify-between rounded-xl border border-neutral-200/90 bg-white p-5 shadow-xs transition hover:border-neutral-300 dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                            >
                                <div>
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <span
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200"
                                        >
                                            <svg
                                                class="h-4 w-4"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    :d="mod.icon"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </span>
                                        <span
                                            class="rounded-full px-2 py-0.5 text-[10px] font-semibold"
                                            :class="
                                                mod.tag === 'Habilitado'
                                                    ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400'
                                                    : 'bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-400'
                                            "
                                        >
                                            {{ mod.tag }}
                                        </span>
                                    </div>

                                    <h3
                                        class="mt-3 text-sm font-semibold text-neutral-900 dark:text-white"
                                    >
                                        {{ mod.title }}
                                    </h3>
                                    <p
                                        class="mt-1 text-xs leading-relaxed text-neutral-500 dark:text-neutral-400"
                                    >
                                        {{ mod.description }}
                                    </p>
                                </div>

                                <div
                                    class="mt-4 border-t border-neutral-100 pt-3 dark:border-neutral-800/80"
                                >
                                    <span
                                        class="flex items-center gap-1 text-[11px] font-medium text-neutral-600 dark:text-neutral-400"
                                    >
                                        <span>Configurar módulo</span>
                                        <span>&rarr;</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </main>

        <!-- Minimalist Footer -->
        <Footer />
    </div>
</template>
