<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <main class="container mx-auto mt-6 flex justify-center">
        <section class="w-full max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <p class="mt-6 text-lg text-gray-700">{{ $post->category->name }} stories</p>
            <p class="mb-3 text-lg text-gray-700">
                {{ $post->created_at->format('F j Y, g:i A') }}
            </p>
            
            <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

            @if ($post->img)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $post->img) }}" alt="Post Image"
                        class="w-80 h-80 object-cover rounded border border-gray-300 shadow-sm">
                </div>
            @endif

            <p class="mt-6 text-lg text-gray-700">{{ $post->text }}</p>
        </section>
    </main>
</x-app-layout>
