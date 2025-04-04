<x-app-layout>
    @foreach ($posts as $post)
        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:w-48" src="https://via.placeholder.com/300x200" alt="Image">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><a href="{{ route('posts.show', ['id', $post->id]) }}">Case Study</a></div>
                    <a href="#"
                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers
                        for your new business</a>
                    <p class="mt-2 text-gray-500">Getting a new business off the ground is a lot of hard work. Here are
                        five ideas you can use to find your first customers.</p>
                    <div class="mt-4">
                        <button
                            class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 focus:outline-none"><a
                                href="{{ route('posts.show',  $post->id) }}">Read
                                More</a></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</x-app-layout>
