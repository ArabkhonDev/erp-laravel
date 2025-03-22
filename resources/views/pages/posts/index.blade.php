<x-guest-layout>
    @include('layouts.header')
    <div class="container m-auto">
        <div class="flex justify-center">

            @foreach ($posts as $post)
                <div class="flex justify-center items-center mx-2">
                    <div class="max-w-[720px] mx-auto">
                        <div
                            class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                            <div
                                class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                                <img src={{$post->image}}"
                                    alt="{{$post->title}}" class="object-cover w-full h-full" />
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <p
                                        class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$post->title}}
                                    </p>
                                </div>
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                                    {{$post->short_content}}
                                </p>
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                                    {{$post->created_at}}
                                </p>
                            </div>
                            <div class="p-6 pt-0">
                                <button type="submit" class="rounded bg-gray-200 py-2 px-4">
                                    <a href="{{ route('news.show', ['id', $post->id]) }}">Read More</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</x-guest-layout>
