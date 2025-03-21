<x-app-layout>
    <link rel="stylesheet"
        href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/32144b924e2aa5af.css" />

    <div class="flex flex-col justify-center items-center bg-white h-[50vh] py-5">
        <div
            class="mx-auto flex w-full flex-col justify-center px-5 pt-0 md:h-[unset] md:max-w-[50%] lg:h-[100vh] min-h-[50vh] lg:max-w-[50%] lg:px-6">

            <div
                class="my-auto mb-auto mt-8 flex flex-col md:mt-[70px] w-[350px] max-w-[450px] mx-auto md:max-w-[450px]  lg:max-w-[450px]">
                <p class="text-[32px] font-bold text-zinc-950 dark:text-white py-2">Teacher Create</p>

                <div>
                    <form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data"
                        class="mb-4">
                        <div class="grid gap-2">
                            <div class="grid gap-1">
                                <label class="text-zinc-950 dark:text-white" for="fname">Full name</label>
                                <input
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    id="fname" placeholder="Enter teacher full name" type="text"
                                    autocapitalize="none" autocomplete="email" autocorrect="off" name="email">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="password">Email</label>
                                <input id="email" placeholder="Email" type="email" autocomplete="current-password"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="email">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="password">Phone</label>
                                <input id="email" placeholder="Email" type="email" autocomplete="current-password"
                                    class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400"
                                    name="email">
                                <label class="text-zinc-950 mt-2 dark:text-white" for="password">Subject</label>
                                <select name="subject" id="">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->title }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button
                                class="whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 mt-2 flex h-[unset] w-full items-center justify-center rounded-lg px-4 py-4 text-sm font-medium"
                                type="submit">Create</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
