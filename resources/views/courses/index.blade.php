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

            @if ($courses->count() === 0)
            <div class="my-8 text-center bg-yellow-100 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-lg shadow-md">
                <p class="text-2xl font-semibold mb-2">🚫 No Courses Available</p>
                <p class="text-sm">It looks like there are no courses added yet. Click below to create your first course.</p>
                <a href="{{ route('courses.create') }}"
                    class="inline-block mt-4 px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    ➕ Create a New Course
                </a>
            </div>
            @else

            <h2 class="text-3xl font-bold text-center text-purple-800 mb-6">📚 All Courses</h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-purple-600 text-white">
                        <tr">
                            <th class="px-6 py-3 font-semibold">ID</th>
                            <th class="px-6 py-3 font-semibold">Course Name</th>
                            <th class="px-6 py-3 font-semibold">Code</th>
                            <th class="px-6 py-3 font-semibold">Credit</th>
                            <th class="px-6 py-3 font-semibold">Semester</th>
                            <th class="px-6 py-3 font-semibold">Level</th>
                            <th class="px-6 py-3 font-semibold">Department</th>
                            <th class="px-6 py-3 font-semibold">Teacher</th>
                            <th class="px-6 py-3 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $course->id }}</td>
                            <td class="px-6 py-4">{{ $course->title }}</td>
                            <td class="px-6 py-4">{{ $course->code }}</td>
                            <td class="px-6 py-4">{{ $course->credit_hours }}</td>
                            <td class="px-6 py-4">Semester {{ $course->semester }}</td>
                            <td class="px-6 py-4">{{ $course->level }}</td>
                            <td class="px-6 py-4">{{ $course->department }}</td>
                            <td class="px-6 py-4">
                                @if ($course->teacher)
                                {{ $course->teacher->name }}
                                @else
                                No Teacher Assigned
                                @endif
                            </td>
                            <td class="">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="text-blue-600 py-2 px-2 rounded hover:text-white hover:bg-blue-700 transition duration-200">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 py-2 px-2 rounded hover:text-white hover:bg-red-700 transition duration-200">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">No courses found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-6 py-2 w-3/5 m-auto">
                    {{ $courses->links() }}
                </div>
            </div>
            <div class="mt-6 flex justify-end items-center">
                <a href="{{ route('courses.create') }}"
                    class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition">
                    ➕ Add New Course
                </a>
            </div>
            @endif
        </div>
</x-app-layout>