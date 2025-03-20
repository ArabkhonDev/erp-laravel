<x-app-layout>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <button class="btn btn-primary m-2 p-2 w-[200px] bg-green-500 rounded text-white-400 hover:text-green-100"><a href="{{route('teachers.create')}}">Create Student</a></button>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tug'ulgan kun</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Edit</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($students as $student)
                    <tr class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <a href="{{route('students.show', $student->id)}}" class="flex">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-full object-cover object-center"
                                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" />
                                    <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm ml-2">
                                    <div class="font-medium text-gray-700">{{ $student->name }}</div>
                                    <div class="text-gray-400">{{ $student->email }}</div>
                                </div>
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $student->phone }}</td>
                        <td class="px-6 py-4">{{ $student->birth_date }}</td>
                        <td>
                            <a x-data="{ tooltip: 'Edite' }"
                                href="{{ route('students.edit',  $student->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $students->links() }}
    </div>

</x-app-layout>
