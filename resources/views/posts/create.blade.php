<x-layout>
    <h1 class="text-3xl font-bold mt-4">Create Post</h1>
    <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="large-input" name="title" placeholder="Title" required
                    class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Content</label>
                <textarea id="message" rows="4" name="content" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Write your content here..."></textarea>
            </div>
            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Post</button>
            </div>
        </form>
    </div>
</x-layout>
