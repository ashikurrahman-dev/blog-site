<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <div class="mb-3">
                            <a href="{{ route('posts.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                                Add New Post
                            </a>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 bg-white text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Text
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-gray-800">
                                            {{ $post->title }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800">
                                            {{ $post->category->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800">
                                            @if ($post->img)
                                            <img src="{{ asset('storage/' . $post->img) }}" alt="Image"
                                            class="w-24 h-24 object-cover rounded border border-gray-200 shadow-sm">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-800">
                                            {{ substr($post->text, 0, 200) }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex justify-end space-x-2">
                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="text-indigo-600 hover:text-indigo-900 font-medium transition">
                                                Edit
                                            </a>
                                            <a href="{{ route('posts.show', $post) }}"
                                                class="text-indigo-600 hover:text-indigo-900 font-medium transition">
                                                Show
                                            </a>
                                            <form method="post" action="{{ route('posts.destroy', $post) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 font-medium transition"
                                                    onclick="return confirm('Are you sure?')"
                                                    >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
