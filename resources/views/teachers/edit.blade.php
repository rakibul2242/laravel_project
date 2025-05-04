<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">✏️ Edit Teacher</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
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

            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $teacher->name) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $teacher->email) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="0{{ old('phone', $teacher->phone) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                        <select name="department" id="department"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Department</option>
                            @foreach(['Computer Science', 'Mathematics', 'Physics', 'Chemistry', 'Biology', 'English', 'Economics', 'History', 'Philosophy', 'Political Science', 'Sociology', 'Psychology', 'Art', 'Music', 'Literature'] as $dept)
                                <option value="{{ $dept }}" {{ old('department', $teacher->department) === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <a href="{{ route('teachers.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-600 hover:text-white transition">
                        ← Back
                    </a>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">
                    💾 Update Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
