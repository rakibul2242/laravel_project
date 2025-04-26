<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN (Optional for icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-info">
    <div class="container m-auto mt-5 mb-5 w-50">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-warning text-white">
                <h4 class="m-0">Edit Student</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('student_update/'.$student->id) }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                    </div>

                    <!-- Roll -->
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input type="number" name="roll" class="form-control" value="{{ $student->roll }}" required>
                    </div>

                    <!-- Section -->
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select class="form-select" id="section" name="section" required>
                            <option value="" disabled>Select Section</option>
                            <option value="A" {{ $student->section == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $student->section == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $student->section == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $student->section == 'D' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $student->phone_number }}" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3" required>{{ $student->address }}</textarea>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">
                            <i class="bi bi-check-circle"></i> Update Student
                        </button>
                        <a href="{{ url('studentList') }}" class="btn btn-outline-danger">
                            <i class="bi bi-arrow-return-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>