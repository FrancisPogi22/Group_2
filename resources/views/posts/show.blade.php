<x-layout>
    <section class="mt-4 flex justify-between">
        <h1 class="text-3xl font-bold">Posts</h1>
        <div class="flex justify-end">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}"
                    class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                </form>
            @endcan
        </div>
    </section>
    <div class="max-w-6xl mx-auto sm-px-6 lg:px-8 mt-8 bg-slate-50 rounded-lg">
        <h1 class="text-4xl text-indigo-800 font-semibold pt-4">{{ $post->title }}</h1>
        <p class="text-gray-600">Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y h:i A') }}</p>
        <main class="max-w-6xl mx-auto lg:mt-4 space-y-6 pb-4">
            <p class="text-gray-700 text-lg pb-4">{{ $post->content }}</p>
            <div class="comment-con">
                @foreach ($comments as $comment)
                    <div class="comment-widget bg-slate-100 drop-shadow-md rounded-lg p-4 flex justify-between">
                         <div class="comment-details">
                            <p class="font-semibold text-indigo-800">{{ $comment->name }}</p>
                            <p class="text-sm">{{ $comment->comment }}</p>
                        </div>
                        <div class="comment-time text-gray-500 text-sm pl-4">
                            {{ \Carbon\Carbon::parse($comment->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}
                        </div>

                        <div class="btn-con flex">
                            @can('update', $comment)
                                <a href="{{ route('comments.edit', $comment->id) }}"
                                    class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900">Edit</a>
                            @endcan
                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="comment-input-con">
                <form action="{{ route('comments.store') }}" method="POST" class="flex items-center">
                    @csrf
                    <input type="number" name="post_id" value="{{ $post->id }}" hidden>
                    <input
                        type="text"class="@error('comment') border-red-500 @enderror border-2 border-sky-500 rounded-full p-2 w-full"
                        name="comment" placeholder="Comment here" required>
                    @error('comment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comment</button>
                </form>
            </div>
        </main>
    </div>
</x-layout>
