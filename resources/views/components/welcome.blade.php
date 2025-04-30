@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="p-6 from-indigo-100 rounded-lg shadow-lg">
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
                    <td class="">
                        <a href="{{ url('/students/edit/' . $student->id) }}" class="text-blue-600 p-3 rounded hover:text-white hover:bg-blue-700 transition duration-200"> Edit </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 p-3 rounded hover:text-white hover:bg-red-700 transition duration-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $students->links() }}
        </div>

    </div>
    <div class="mt-6 flex justify-end items-center">
        <a href="{{ route('students.create') }}" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg shadow hover:bg-purple-700 transition">
            + Add Student
        </a>
    </div>
</div>