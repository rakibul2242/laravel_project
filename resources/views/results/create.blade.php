<x-app-layout>
    <div class="py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">➕ Add Student Result</h2>

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
                    <a href="{{ route('results.index') }}" class="inline-block font-medium mt-1 text-blue-600 hover:text-blue-800 underline">
                        View All Results
                    </a>
                </div>
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

            {{-- Form --}}
            <form action="{{ route('results.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Student --}}
                    <div>
                        <label for="student_id" class="block text-sm font-medium text-gray-700">Select Student</label>
                        <select name="student_id" id="student_id" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            <option value="" disabled selected>-- Select Student --</option>
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }} (Roll: {{ $student->roll }})</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Course --}}
                    <div>
                        <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course</label>
                        <select name="course_id" id="course_id" onchange="fillCourseDetails()" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            <option value="" disabled selected>-- Select Course --</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                data-title="{{ $course->title }}"
                                data-code="{{ $course->code }}"
                                data-description="{{ $course->description }}"
                                data-credit_hours="{{ $course->credit_hours }}"
                                data-semester="{{ $course->semester }}"
                                data-level="{{ $course->level }}"
                                data-department="{{ $course->department }}"
                                data-teacher="{{ $course->teacher->name ?? 'N/A' }}">
                                {{ $course->title }} ({{ $course->code }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <select name="result" id="result" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>

                </div>

                {{-- Readonly Course Details --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <x-readonly-input label="Course Title" id="course_title" />
                    <x-readonly-input label="Course Code" id="course_code" />
                    <x-readonly-input label="Credit Hours" id="credit_hours" />
                    <x-readonly-input label="Semester" id="semester" />
                    <x-readonly-input label="Level" id="level" />
                    <x-readonly-input label="Department" id="department" />
                    <x-readonly-input label="Teacher" id="teacher_name" />
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" class="mt-1 w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg" rows="3" readonly></textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <a href="{{ route('results.index') }}">🔙<span class="text-purple-600 font-semibold underline hover:text-blue-600">Back to Results</span></a>
                    <button type="submit" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
                        ➕ Add Result
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- JS Script --}}
    <script>
        function fillCourseDetails() {
            const select = document.getElementById('course_id');
            const selected = select.options[select.selectedIndex];

            document.getElementById('course_title').value = selected.getAttribute('data-title');
            document.getElementById('course_code').value = selected.getAttribute('data-code');
            document.getElementById('credit_hours').value = selected.getAttribute('data-credit_hours');
            document.getElementById('semester').value = selected.getAttribute('data-semester');
            document.getElementById('level').value = selected.getAttribute('data-level');
            document.getElementById('department').value = selected.getAttribute('data-department');
            document.getElementById('teacher_name').value = selected.getAttribute('data-teacher');
            document.getElementById('description').value = selected.getAttribute('data-description');
        }
    </script>
</x-app-layout>