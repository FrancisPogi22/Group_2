<x-layout>
    <section class="mt-4">
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold">Posts</h1>
            <a href="{{ route('posts.create') }}"
                class="btn btn-add-post bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">Add Post</a>
        </div>
    </section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        @if (isset($posts))
            @foreach ($posts as $post)
                <div class="max-w-full rounded-lg shadow-md bg-gray-100 relative">
                    <div class="p-4">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h5 class="mb-2 text-xl font-bold text-gray-900">{{ $post->title }}</h5>
                        </a>
                        <p class="text-sm text-gray-700">{{ $post->content }}</p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-2 text-sm text-gray-500">
                        Posted by {{ $post->user->name }} on {{ \Carbon\Carbon::parse($post->created_at)->timezone('Asia/Manila')->format('M d, Y') }} at {{ \Carbon\Carbon::parse($post->created_at)->timezone('Asia/Manila')->format('h:i A') }}
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <a href="/posts/{{ $post->id }}"
                            class="btn-read-more inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>

<style>
    .grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .grid > * {
        grid-column: 1 / span 1;
    }
</style>
