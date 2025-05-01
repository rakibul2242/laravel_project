<div class="py-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Heading -->
        <h2 class="text-3xl font-bold text-purple-800 mb-8 text-center">📊 Dashboard</h2>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-6 rounded-xl shadow-lg">
                <h3 class="text-2xl font-bold">👨‍🏫 Teachers</h3>
                <p class="mb-3 mt-2 font-semibold">Total : 44</p>
                <a href="{{ route('teachers.index') }}" class="text-sm px-3 py-2 border text-white text-semibold rounded hover:border-0 hover:bg-purple-700">View All</a>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-teal-500 text-white p-6 rounded-xl shadow-lg">
                <h3 class="text-2xl font-bold">🎓 Students</h3>
                <p class="mb-3 mt-2 font-semibold">Total : 55</p>
                <a href="{{ route('students.index') }}" class="text-sm px-3 py-2 border text-white text-semibold rounded hover:border-0 hover:bg-green-700">View All</a>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-pink-500 text-white p-6 rounded-xl shadow-lg">
                <h3 class="text-2xl font-bold">📚 Courses</h3>
                <p class="mb-3 mt-2 font-semibold">Total : 66</p>
                <a href="{{ route('courses.index') }}" class="text-sm px-3 py-2 border text-white text-semibold rounded hover:border-0 hover:bg-yellow-700">View All</a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <a href="{{ route('teachers.create') }}" class="bg-white shadow-lg hover:shadow-xl p-5 rounded-xl border border-purple-200 text-purple-700 text-center font-semibold transition">
                ➕ Add Teacher
            </a>
            <a href="{{ route('students.create') }}" class="bg-white shadow-lg hover:shadow-xl p-5 rounded-xl border border-green-200 text-green-700 text-center font-semibold transition">
                ➕ Add Student
            </a>
            <a href="{{ route('courses.create') }}" class="bg-white shadow-lg hover:shadow-xl p-5 rounded-xl border border-yellow-200 text-yellow-700 text-center font-semibold transition">
                ➕ Add Course
            </a>
        </div>

    </div>
</div>