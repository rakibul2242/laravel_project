<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">✏️ Edit Course</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                    <a href="{{ route('courses.index') }}" class="text-blue-600 underline hover:text-blue-800 ml-2">View All Courses</a>
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

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700">Course Code</label>
                        <input type="text" name="code" id="code" value="{{ old('code', $course->code) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">{{ old('description', $course->description) }}</textarea>
                    </div>

                    <div>
                        <label for="credit_hours" class="block text-sm font-medium text-gray-700">Credit Hours</label>
                        <input type="number" name="credit_hours" id="credit_hours" value="{{ old('credit_hours', $course->credit_hours) }}"
                            min="1" max="6" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <select name="semester" id="semester" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ $course->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select name="level" id="level" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="Undergraduate" {{ $course->level == 'Undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                            <option value="Postgraduate" {{ $course->level == 'Postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                        </select>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                        <select name="department" id="department" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Department</option>
                            <option value="Computer Science" {{ $course->department == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                            <option value="Mathematics" {{ $course->department == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                            <option value="Physics" {{ $course->department == 'Physics' ? 'selected' : '' }}>Physics</option>
                            <option value="Chemistry" {{ $course->department == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                            <option value="Biology" {{ $course->department == 'Biology' ? 'selected' : '' }}>Biology</option>
                            <option value="English" {{ $course->department == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Economics" {{ $course->department == 'Economics' ? 'selected' : '' }}>Economics</option>
                            <option value="History" {{ $course->department == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Philosophy" {{ $course->department == 'Philosophy' ? 'selected' : '' }}>Philosophy</option>
                        </select>
                    </div>

                    <div>
                        <label for="teacher_id" class="block text-sm font-medium text-gray-700">Assigned Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">
                        Update Course
                    </button>

                    <a href="{{ route('courses.index') }}" class="inline-block px-4 py-2 text-purple-600 font-semibold rounded-lg border border-purple-600 hover:bg-purple-600 hover:text-white transition duration-200">
                        Go to Course List
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
