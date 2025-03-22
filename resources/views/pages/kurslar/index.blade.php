<x-guest-layout>
    @include('layouts.header')
    <!-- component -->
    @foreach ($courses as $course)
        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:w-48" src="{{ $course->image }}" alt="{{ $course->title }}">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $course->title }}</div>
                    <a href="#"
                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $course->description }}</a>
                    <div class="mt-4">
                        <button
                            class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 focus:outline-none">
                            <a href="{{ route('kurslar.show', ['id', $course->id]) }}">Read
                                More
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $courses->links() }}
</x-guest-layout>
