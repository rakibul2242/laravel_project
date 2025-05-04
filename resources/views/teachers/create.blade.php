<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
            <h2 class="text-2xl font-bold text-purple-700 mb-8 text-center">👩‍🏫 Add New Teacher</h2>

            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
                <a href="{{ route('teachers.create') }}" class="text-blue-600 underline hover:text-blue-800 ml-2">View All Teachers</a>
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

            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="number" name="phone" id="phone" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
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
                            <option value="Political Science">Political Science</option>
                            <option value="Sociology">Sociology</option>
                            <option value="Psychology">Psychology</option>
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Literature">Literature</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <a href="{{ route('teachers.index') }}">🔙 <span class="text-purple-600 font-semibold underline hover:text-blue-600"> Back to Teachers</span></a>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition duration-200">➕ Add Teacher</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>