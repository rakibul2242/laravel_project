<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">✏️ Edit Student</h2>

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

            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="roll" class="block text-sm font-medium text-gray-700">Roll No</label>
                        <input type="text" name="roll" id="roll" value="{{ old('roll', $student->roll) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
                        <select name="section" id="section"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                            <option value="" disabled>Select Section</option>
                            @foreach(['A', 'B', 'C', 'D'] as $sec)
                            <option value="{{ $sec }}" {{ $student->section === $sec ? 'selected' : '' }}>{{ $sec }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $student->phone_number) }}"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="address" rows="3"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">{{ old('address', $student->address) }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <div>
                        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-600 hover:text-white transition">← Back                        </a>
                        <a href="{{ route('results.index') }}" class="ml-3 ">🔙<span class="text-purple-600 font-semibold hover:underline">Go to Results</span></a>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">
                    💾 Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>