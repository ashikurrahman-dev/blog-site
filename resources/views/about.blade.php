<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <main class="container mx-auto mt-6 flex justify-center">
        <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-4">About us</h1>
            <p class="mt-4 text-lg text-gray-600">We're the best company in the world!</p>
        </section>
    </main>
</x-app-layout>
    