<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">📚 Add New Course</h2>

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
                    <a href="{{ route('courses.index') }}" class="inline-block font-medium mt-1 text-blue-600 hover:text-blue-800 underline">
                        View All Courses
                    </a>
                </div>
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

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" name="title" id="title" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700">Course Code</label>
                        <input type="number" name="code" id="code" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                    </div>

                    <div>
                        <label for="credit_hours" class="block text-sm font-medium text-gray-700">Credit Hours</label>
                        <input type="number" name="credit_hours" id="credit_hours" min="1" max="6" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <select name="semester" id="semester" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled selected>Select Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                                @endfor
                        </select>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select name="level" id="level" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled selected>Select Level</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Postgraduate">Postgraduate</option>
                        </select>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                        <select name="department" id="department" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Physics">Physics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Biology">Biology</option>
                            <option value="English">English</option>
                            <option value="Economics">Economics</option>
                            <option value="History">History</option>
                            <option value="Philosophy">Philosophy</option>
                        </select>
                    </div>

                    <div>
                        <label for="teacher_id" class="block text-sm font-medium text-gray-700">Assigned Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled selected>Select Teacher</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <a href="{{ route('courses.index') }}">🔙 <span class="text-purple-600 font-semibold underline hover:text-blue-600">Back to Courses</span></a>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">➕ Add Course</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>