<x-guest-layout>
    <!-- component -->
    @include('layouts.header')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class=" flex-col items-center md:flex-row">
            <!-- Product Image -->
            <div class="md:w-1/3 p-4 relative">
                <div class=" ">
                    <img src="{{ $post->image ?? null }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-lg"
                        width="500px" height="250px" />
                    <button class="absolute top-2 right-2 text-red-500 hover:text-red-600 focus:outline-none">
                        <svg class="w-6 h-6 absolute top-0 right-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Product Details -->
            <div class="md:w-2/3 p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $post->title}}</h1>
                <p class="text-sm text-gray-600 mb-4">{{ $post->content }}</p>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-500 ml-2">1,234 reviews</span>
                </div>

                <ul class="text-sm text-gray-700 mb-6">
                    <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>Abode Photoshop</li>
                        <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none"
                          stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                          </path>
                      </svg>Abode Illustrator</li>
                      <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>Corel Draw</li>
                </ul>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">$899.00</span>
                        <span class="ml-2 text-sm font-medium text-gray-500 line-through">$1,000.00</span>
                    </div>
                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Save 10%</span>
                </div>
                <div class="flex space-x-4">
                    <form action="" method="post"></form>
                    <button
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Kursga yozilish
                    </button>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
