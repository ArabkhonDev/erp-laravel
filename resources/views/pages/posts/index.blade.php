<x-guest-layout>
    @include('layouts.header')
    @foreach ($posts as $post)
        <div class="flex justify-center items-center min-h-screen">
            <div class="max-w-[720px] mx-auto">
                <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                    <div
                        class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                        <img src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                            alt="card-image" class="object-cover w-full h-full" />
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p
                                class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                Apple AirPods
                            </p>
                        </div>
                        <p
                            class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                            With plenty of talk and listen time, voice-activated Siri access, and an
                            available wireless charging case.
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button type="submit" class="rounded bg-gray-200 py-2 px-4">
                            <a href="{{ route('news.show', $post->id) }}">Read More</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</x-guest-layout>
