<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { home, register } from '@/routes';

const page = usePage();
const appName = computed<string>(() => (page.props.name as string) || 'Abcico');

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

function submit() {
    form.post('/login', {
        onFinish: () => {
            form.reset('password');
        },
    });
}

function fillDemoCredentials() {
    form.email = 'test@example.com';
    form.password = 'password';
}
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center justify-center bg-neutral-50 px-4 py-12 text-neutral-900 sm:px-6 lg:px-8 dark:bg-neutral-950 dark:text-neutral-100"
    >
        <Head title="Iniciar sesión" />

        <div class="w-full max-w-md">
            <!-- Brand Link -->
            <div class="mb-8 text-center">
                <Link
                    :href="home.url()"
                    class="inline-flex items-center gap-2 transition hover:opacity-80"
                >
                    <span
                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-neutral-900 text-white shadow-xs dark:bg-white dark:text-neutral-950"
                    >
                        <svg
                            class="h-5 w-5"
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
                        class="text-xl font-semibold tracking-tight text-neutral-900 dark:text-white"
                    >
                        {{ appName }}
                    </span>
                </Link>

                <h1
                    class="mt-6 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white"
                >
                    Iniciar sesión
                </h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Ingresa tus credenciales para acceder al menú completo
                </p>
            </div>

            <!-- Login Card -->
            <div
                class="rounded-2xl border border-neutral-200/90 bg-white p-6 shadow-sm sm:p-8 dark:border-neutral-800 dark:bg-neutral-900"
            >
                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Email -->
                    <div>
                        <label
                            for="email"
                            class="block text-xs font-semibold tracking-wider text-neutral-700 uppercase dark:text-neutral-300"
                        >
                            Correo electrónico
                        </label>
                        <div class="mt-1.5">
                            <input
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="nombre@ejemplo.com"
                                class="block w-full rounded-lg border border-neutral-300 bg-white px-3.5 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition focus:border-neutral-900 focus:ring-1 focus:ring-neutral-900 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500 dark:focus:border-white dark:focus:ring-white"
                                :class="{
                                    'border-red-500 focus:border-red-500 focus:ring-red-500':
                                        form.errors.email,
                                }"
                            />
                        </div>
                        <p
                            v-if="form.errors.email"
                            class="mt-1.5 text-xs text-red-600 dark:text-red-400"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Password -->
                    <div>
                        <label
                            for="password"
                            class="block text-xs font-semibold tracking-wider text-neutral-700 uppercase dark:text-neutral-300"
                        >
                            Contraseña
                        </label>
                        <div class="mt-1.5">
                            <input
                                id="password"
                                type="password"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="block w-full rounded-lg border border-neutral-300 bg-white px-3.5 py-2 text-sm text-neutral-900 placeholder-neutral-400 transition focus:border-neutral-900 focus:ring-1 focus:ring-neutral-900 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500 dark:focus:border-white dark:focus:ring-white"
                                :class="{
                                    'border-red-500 focus:border-red-500 focus:ring-red-500':
                                        form.errors.password,
                                }"
                            />
                        </div>
                        <p
                            v-if="form.errors.password"
                            class="mt-1.5 text-xs text-red-600 dark:text-red-400"
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center justify-between">
                        <label
                            class="flex cursor-pointer items-center gap-2 text-xs text-neutral-600 dark:text-neutral-400"
                        >
                            <input
                                type="checkbox"
                                v-model="form.remember"
                                class="h-4 w-4 rounded border-neutral-300 text-neutral-900 focus:ring-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:focus:ring-white"
                            />
                            <span>Recordarme</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="flex w-full cursor-pointer items-center justify-center rounded-lg bg-neutral-900 px-4 py-2.5 text-sm font-medium text-white shadow-xs transition hover:bg-neutral-800 disabled:opacity-50 dark:bg-white dark:text-neutral-950 dark:hover:bg-neutral-100"
                        >
                            <svg
                                v-if="form.processing"
                                class="mr-2 h-4 w-4 animate-spin text-current"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8v8H4z"
                                ></path>
                            </svg>
                            <span>{{
                                form.processing
                                    ? 'Iniciando sesión...'
                                    : 'Entrar'
                            }}</span>
                        </button>
                    </div>
                </form>

                <!-- Demo helper -->
                <div
                    class="mt-6 rounded-lg border border-neutral-200/60 bg-neutral-50 p-3 dark:border-neutral-800/60 dark:bg-neutral-950/50"
                >
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-neutral-500 dark:text-neutral-400"
                            >Cuenta de demostración:</span
                        >
                        <button
                            type="button"
                            @click="fillDemoCredentials"
                            class="cursor-pointer font-medium text-neutral-900 underline hover:text-neutral-700 dark:text-white dark:hover:text-neutral-300"
                        >
                            Autocompletar
                        </button>
                    </div>
                    <p
                        class="mt-1 font-mono text-[11px] text-neutral-600 dark:text-neutral-400"
                    >
                        test@example.com / password
                    </p>
                </div>
            </div>

            <!-- Footer links -->
            <div
                class="mt-6 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400"
            >
                <Link
                    :href="home.url()"
                    class="inline-flex items-center gap-1 hover:text-neutral-900 dark:hover:text-white"
                >
                    <svg
                        class="h-3.5 w-3.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    <span>Volver al inicio</span>
                </Link>

                <p>
                    ¿No tienes cuenta?
                    <Link
                        :href="register.url()"
                        class="font-medium text-neutral-900 underline hover:text-neutral-700 dark:text-white dark:hover:text-neutral-300"
                    >
                        Regístrate
                    </Link>
                </p>
            </div>
        </div>
    </div>
</template>
