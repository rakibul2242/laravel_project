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

            @if (session('success_distroy'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success_distroy') }}
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
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

            @if ($teachers->count() === 0)
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
                <h2 class="text-3xl font-bold text-center text-purple-800">👨‍🏫 Teacher List</h2>
                <a href="{{ route('teachers.create') }}" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition">
                    ➕ Add New Teacher
                </a>
            </div>
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 font-semibold">No.</th>
                            <th class="px-6 py-3 font-semibold">Name</th>
                            <th class="px-6 py-3 font-semibold">Email</th>
                            <th class="px-6 py-3 font-semibold">Phone</th>
                            <th class="px-6 py-3 font-semibold">Department</th>
                            <th class="px-6 py-3 font-semibold pl-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-200 border-b border-purple-200">
                        @foreach($teachers as $index => $teacher)
                        <tr class="hover:bg-purple-50">
                            <td class="px-6 py-4">{{ $teachers->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $teacher->name }}</td>
                            <td class="px-6 py-4">{{ $teacher->email }}</td>
                            <td class="px-6 py-4">0{{ $teacher->phone }}</td>
                            <td class="px-6 py-4">{{ $teacher->department }}</td>
                            <td class="">
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="text-blue-600 py-2 px-2 rounded hover:text-white hover:bg-blue-700 transition duration-200">Edit</a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?');" style="display:inline;">
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
                    {{ $teachers->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>