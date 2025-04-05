<x-app-layout>
    <!-- component -->
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="flex flex-col items-center md:flex-row">
      <!-- Product Image -->
      <div class="md:w-1/3 p-4 relative">
        <div class=" ">
          <img src="{{asset('storage/'.$course->image)}}" alt="{{$course->title}}" class="w-full h-auto object-cover rounded-lg"/>
        </div>
      </div>
      
      <div class="md:w-2/3 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{$course->title}}</h1>
        <p class="text-sm text-gray-600 mb-4">{{$course->description}}</p>
        
        <ul class="text-sm text-gray-700 mb-6">
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Basic knowladge</li>
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Database MySQL, PostgresSQL, MongoDB</li>
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Advanced knowladge</li>
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Practice</li>
        </ul>
        
        <div class="flex items-center justify-between mb-4">
          <div>
            <span class="ml-2 text-sm font-medium text-gray-500">Narxi: {{$course->price}}$</span>
          </div>
          <div>
            <span class="ml-2 text-sm font-medium text-gray-500">Davomiyligi: {{$course->duration}} - oy</span>
          </div>
        </div>
        
        <p class="text-green-600 text-sm font-semibold mb-4">Offline</p>
        
        <div class="flex space-x-4">
          <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            Now write course
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>