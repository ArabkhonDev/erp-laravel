<x-app-layout>
    <!-- component -->
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex-col items-center md:flex-row">
            <!-- Product Image -->
            <div class="md:w-1/3 p-4 relative">
                <div class="">
                    <h1>Group name: {{ $group->name }}</h1>
                </div>
            </div>

            <!-- Product Details -->
            <div class="md:w-2/3 p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Kurs nomi: {{ $group->course->title }}</h1>
                <p class="text-sm text-gray-600 mb-4">Boshlagan sana: {{ $group->start_month }}</p>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-500 ml-2"> Gruppa studentlar soni:
                        <strong>{{ count($group->students) }}</strong></span>
                </div>
                <table class="w-full justify-around">
                    <thead>
                        <h2>Gurux talabalarini malumotlari</h2>
                        <tr>
                            <th>ID nomeri</th>
                            <th>Ismi</th>
                            <th>Tel nomeri</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td><a href="{{route('students.show', ['id', $student->id])}}">{{ $student->name }}</a></td>
                                <td><a href="tel:{{ $student->phone }}"></a>{{ $student->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <ul class="text-sm text-gray-700 mb-6">
                    <li class="flex items-center mb-1">Grupani O'qtuvchi ismi: {{ $group->teacher->name }}</li>
                    <li class="flex items-center mb-1">Grupani dars boshlanish vaqti: {{ $group->start_time }}</li>
                    <li class="flex items-center mb-1">Grupani dars tugash vaqti: {{ $group->end_time }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
