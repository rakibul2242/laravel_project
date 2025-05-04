<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"> {{ session('error') }}</div>
            @endif

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Whoops! Something went wrong.</strong>
                <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if ($students->count() === 0)
            <div class="my-8 text-center bg-yellow-100 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-lg shadow-md">
                <p class="text-2xl font-semibold mb-2">🚫 No Courses Available</p>
                <p class="text-sm">It looks like there are no courses added yet. Click below to create your first course.</p>
                <a href="{{ route('courses.create') }}"
                    class="inline-block mt-4 px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    ➕ Create a New Course
                </a>
            </div>
            @else

            <h2 class="text-3xl font-bold text-center text-purple-800 mb-6">🎓 Student List</h2>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 font-semibold">ID</th>
                            <th class="px-6 py-3 font-semibold">Name</th>
                            <th class="px-6 py-3 font-semibold">Roll</th>
                            <th class="px-6 py-3 font-semibold">Section</th>
                            <th class="px-6 py-3 font-semibold">Phone</th>
                            <th class="px-6 py-3 font-semibold">Address</th>
                            <th class="px-6 py-3 font-semibold">Result</th>
                            <th class="px-6 py-3 font-semibold pl-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-200">
                        @foreach($students as $student)
                        <tr class="hover:bg-purple-50">
                            <td class="px-6 py-4">{{ $student->id }}</td>
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->roll }}</td>
                            <td class="px-6 py-4">{{ $student->section }}</td>
                            <td class="px-6 py-4">{{ $student->phone_number }}</td>
                            <td class="px-6 py-4">{{ $student->address }}</td>
                            <td class="px-6 py-4 space-y-1">
                                @forelse($student->results as $result)
                                <div class="d-flex">
                                    <strong>{{ $result->course_name }}</strong>
                                    <span class="text-gray-500"><sub>By {{ $result->teacher }}</sub></span>
                                    <span class="font-semibold text-purple-700">Result: {{ $result->result }}</span>
                                </div>
                                @empty
                                <span class="text-gray-400 italic">No results</span>
                                @endforelse
                            </td>
                            <td class="">
                                <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 py-2 px-2 rounded hover:text-white hover:bg-blue-700 transition duration-200"> Edit </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 py-2 px-2 rounded hover:text-white hover:bg-red-700 transition duration-200">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-2 w-3/5 m-auto">
                    {{ $students->links() }}
                </div>
            </div>
            <div class="mt-6 flex justify-end items-center">
                <a href="{{ route('students.create') }}" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition">
                    ➕ Add New Student
                </a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>