<x-app-layout>
    <link rel="stylesheet"
        href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/32144b924e2aa5af.css" />

    <div class="flex flex-col justify-center items-center bg-gray-400  h-[70vh] py-5">
        <div
            class="mx-auto flex w-full flex-col justify-center px-5 pt-0 md:h-[unset] md:max-w-[50%] lg:h-[100vh] min-h-[50vh] lg:max-w-[50%] lg:px-6">

            <div
                class="my-auto mb-auto mt-8 flex flex-col md:mt-[70px] w-[350px] max-w-[450px] mx-auto md:max-w-[450px]  lg:max-w-[450px]">
                <p class="text-[32px] font-bold text-zinc-950 dark:text-white py-2">Create Course</p>

                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="grid gap-2">
                            <div class="grid gap-1">
                                <label class="text-zinc-950 dark:text-white" for="title">Kurs nomi</label>
                                <input
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    id="title" placeholder="Enter course title" name="title" type="text">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="desc">Tasnif</label>
                                <input id="desc" placeholder="Kurs tasnifi" type="text"
                                    autocomplete="current-password"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="description">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="desc">Narxi</label>
                                <input id="desc" placeholder="Kurs narxi" type="text"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="price">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="desc">Davomiyligi</label>
                                <input id="desc" placeholder="Kurs davomiyligi" type="number"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="duration">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="password">Image</label>
                                <input id="email" placeholder="Email" type="file" autocomplete="current-password"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="image">
                            </div>
                            <button
                                class="whitespace-nowrap bg-green-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 mt-2 flex h-[unset] w-full items-center justify-center rounded-lg px-4 py-4 text-sm font-medium"
                                type="submit">Create</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
