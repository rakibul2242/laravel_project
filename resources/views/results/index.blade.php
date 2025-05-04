<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
            @endif

            @if ($results->isEmpty())
            <div class="my-8 text-center bg-yellow-100 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-lg shadow-md">
                <p class="text-2xl font-semibold mb-2">📉 No Results Found</p>
                <p class="text-sm">There are no student results available. Click below to add a new result.</p>
                <a href="{{ route('results.create') }}"
                    class="inline-block mt-4 px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    ➕ Add New Result
                </a>
            </div>
            @else

            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-bold text-center text-purple-800">📊 Student Results</h2>
                <a href="{{ route('results.create') }}" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition"> ➕ Add New Result</a>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 font-semibold">No.</th>
                            <th class="px-6 py-3 font-semibold">Student</th>
                            <th class="px-6 py-3 font-semibold">Roll No</th>
                            <th class="px-6 py-3 font-semibold">Course Name</th>
                            <th class="px-6 py-3 font-semibold">Course Code</th>
                            <th class="px-6 py-3 font-semibold">Teacher</th>
                            <th class="px-6 py-3 font-semibold">Result</th>
                            <th class="px-6 py-3 font-semibold pl-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-200">
                        @foreach($results as $index => $result)
                        <tr class="hover:bg-purple-50">
                            <td class="px-6 py-4">{{ $results->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $result->student->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $result->student->roll ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $result->course->title ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $result->course->code ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $result->course->teacher->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-semibold text-purple-700">{{ $result->result }}</td>
                            <td class="">
                                <a href="{{ route('results.edit', $result->id) }}"
                                    class="text-blue-600 py-2 px-2 rounded hover:text-white hover:bg-blue-700 transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('results.destroy', $result->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this result?');"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 py-2 px-2 rounded hover:text-white hover:bg-red-700 transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-2 w-3/5 m-auto">
                    {{ $results->links() }}
                </div>
            </div>

            @endif
        </div>
    </div>
</x-app-layout>