<x-app-layout>
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class=" flex-col items-center md:flex-row">
      <div class="md:w-1/3 p-4 relative">
        <div class=" ">
          <img src="#" alt="Teacher" class="w-full h-auto object-cover rounded-lg"/>
        </div>
      </div>
      
      <div class="md:w-2/3 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{$teacher->name}}</h1>
        <p class="text-sm text-gray-600 mb-4">Manzil: {{$teacher->address}}</p>
        
        <div class="flex items-center mb-4">
          <span class="text-sm text-gray-500 ml-2">{{$teacher->birth_date}}</span>
        </div>
        
        <ul class="text-sm text-gray-700 mb-6">
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{$teacher->address}}</li>
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{$teacher->email}}</li>
          <li class="flex items-center mb-1"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{$teacher->phone}}</li>
        </ul>
        
        <div class="flex items-center justify-between mb-4">
          <div>
            <span class="text-3xl font-bold text-gray-900">{{$teacher->subject}}</span>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>