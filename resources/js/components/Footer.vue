<script setup lang="ts">
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const appName = computed<string>(() => (page.props.name as string) || 'Abcico');
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer
        class="mt-auto border-t border-neutral-200/80 bg-white py-8 text-neutral-500 dark:border-neutral-800/80 dark:bg-neutral-950 dark:text-neutral-400"
    >
        <div
            class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 sm:flex-row sm:px-6 lg:px-8"
        >
            <div class="flex items-center gap-2">
                <span
                    class="flex h-5 w-5 items-center justify-center rounded bg-neutral-900 text-[10px] font-bold text-white dark:bg-white dark:text-neutral-900"
                >
                    A
                </span>
                <span
                    class="text-xs font-medium text-neutral-600 dark:text-neutral-300"
                >
                    {{ appName }}
                </span>
                <span class="text-xs text-neutral-400">·</span>
                <span class="text-xs text-neutral-400"
                    >Diseño minimalista y modular</span
                >
            </div>

            <p class="text-xs text-neutral-400">
                &copy; {{ currentYear }} {{ appName }}. Todos los derechos
                reservados.
            </p>
        </div>
    </footer>
</template>
