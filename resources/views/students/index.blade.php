<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
        @if (session('success'))
            <div class="flex items-start bg-green-50 border-l-8 border-green-500 text-green-600 p-4 rounded-r-md shadow-xl mb-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition>
                <div class="flex-1">
                    <p class="text-lg flex font-semibold items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="3"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>{{ session('success') }}
                    </p>
                </div>
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
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-bold text-center text-purple-800">🎓 Student List</h2>
                <a href="{{ route('students.create') }}" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition">➕ Add New Student</a>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 font-semibold">No.</th>
                            <th class="px-6 py-3 font-semibold">Name</th>
                            <th class="px-6 py-3 font-semibold">Roll</th>
                            <th class="px-6 py-3 font-semibold">Section</th>
                            <th class="px-6 py-3 font-semibold">Phone</th>
                            <th class="px-6 py-3 font-semibold">Address</th>
                            <th class="px-6 py-3 font-semibold">Result</th>
                            <th class="px-6 py-3 font-semibold pl-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-b border-purple-200 divide-purple-200">
                        @foreach($students as $index => $student)
                        <tr class="hover:bg-purple-50">
                            <td class="px-6 py-4">{{ $students->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->roll }}</td>
                            <td class="px-6 py-4">{{ $student->section }}</td>
                            <td class="px-6 py-4">{{ $student->phone_number }}</td>
                            <td class="px-6 py-4">{{ $student->address }}</td>

                            <td class="px-6 py-4">
                                @if($student->results->isEmpty())
                                <span class="text-gray-400 italic">No results</span>
                                @else
                                @php $resultsToShow = $student->results->take(2); @endphp

                                @foreach($resultsToShow as $result)
                                <span class="relative group inline-block mb-1">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded font-semibold mr-1">
                                        {{ $result->result }}
                                    </span>
                                    <div class="absolute z-10 hidden group-hover:block bg-white text-sm text-gray-700 border border-gray-300 shadow-lg p-3 rounded-lg w-64 top-full left-1/2 transform -translate-x-1/2 mt-1">
                                        <div><strong>Course:</strong> {{ $result->course->title ?? 'N/A' }} ({{ $result->course->code ?? '' }})</div>
                                        <div><strong>Teacher:</strong> {{ $result->course->teacher->name ?? 'N/A' }}</div>
                                        <div class="text-purple-600 font-semibold"><strong>Result:</strong> {{ $result->result ?? 'N/A' }}</div>
                                    </div>
                                </span>
                                @endforeach

                                @if($student->results->count() > 2)
                                @php $remaining = $student->results->count() - 2; @endphp
                                <span class="relative group text-sm text-blue-600 underline cursor-pointer">
                                    +{{ $remaining }} more
                                    <div class="absolute z-10 hidden group-hover:block bg-white text-sm text-gray-700 border border-gray-300 shadow-lg p-3 rounded-lg w-64 top-full left-1/2 transform -translate-x-1/2 max-h-[200px] overflow-y-auto">
                                        @foreach($student->results->slice(2) as $result)
                                        <div class="mb-2 border-b pb-1">
                                            <strong>{{ $result->course->title ?? 'N/A' }}</strong> ({{ $result->course->code ?? '' }})<br>
                                            Teacher: {{ $result->course->teacher->name ?? 'N/A' }}<br>
                                            <span class="text-purple-600 font-semibold">Result: {{ $result->result }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </span>

                                @endif
                                @endif
                            </td>

                            <td class="">
                                <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 py-2 px-2 rounded hover:text-white hover:bg-blue-700 transition duration-200">Edit</a>
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
            @endif
        </div>
    </div>
</x-app-layout>