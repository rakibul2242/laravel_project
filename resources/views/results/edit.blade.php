<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-purple-800 mb-6">✏️ Edit Student Result</h2>

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

            <form action="{{ route('results.update', $result->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Student Info -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Student Name</label>
                        <input type="text" value="{{ $result->student->name ?? 'N/A' }}" disabled
                            class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Roll Number</label>
                        <input type="text" value="{{ $result->student->roll ?? 'N/A' }}" disabled
                            class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>

                    <!-- Course Info -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" value="{{ $result->course->title ?? 'N/A' }}" disabled
                            class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Course Code</label>
                        <input type="text" value="{{ $result->course->code ?? 'N/A' }}" disabled
                            class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Teacher</label>
                        <input type="text" value="{{ $result->course->teacher->name ?? 'N/A' }}" disabled
                            class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>

                    <!-- Editable Result -->
                    <div>
                        <label for="result" class="block text-sm font-medium text-gray-700">Result Grade</label>
                        <select name="result" id="result" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Grade</option>
                            @foreach (['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F'] as $grade)
                            <option value="{{ $grade }}" {{ $result->result == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center"> 
                    <a href="{{ route('results.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-600 hover:text-white transition">← Back </a>
                    <button type="submit" class="px-5 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition"> 💾 Update Result</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>