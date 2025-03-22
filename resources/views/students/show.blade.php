<x-app-layout>
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class=" flex-col items-center md:flex-row">
      <div class="md:w-1/3 p-4 relative">
        <div class=" ">
          <img src="#" alt="student" class="w-full h-auto object-cover rounded-lg"/>
        </div>
      </div>
      
      <!-- Product Details -->
      <div class="md:w-2/3 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{$student->name}}</h1>
        <p class="text-sm text-gray-600 mb-4">{{$student->email}}</p>
        
        <div class="flex items-center mb-4">
          <span class="text-sm text-gray-500 ml-2">{{$student->birth_date}}</span>
        </div>
        <div class="flex items-center justify-between mb-4">
          <div>
            <a href="tel:{{$student->phone}}" class="text-3xl font-bold text-gray-900">{{$student->phone}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>