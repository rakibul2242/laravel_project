<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-info">

    @if (session('success'))
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center rounded-top">
                <h4 class="mb-0">Student Registration</h4>
            </div>
            <div class="card-body rounded-bottom border p-4">
                <form action="{{ url('student_form') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll Number</label>
                        <input type="number" class="form-control" id="roll" name="roll" required>
                    </div>

                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select class="form-select" id="section" name="section" required>
                            <option value="" disabled selected>Select Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-2">
                        <i class="bi bi-check-circle me-1"></i> Submit
                    </button>

                    <a href="{{ url('studentList') }}" class="btn btn-outline-primary w-100">
                        <i class="bi bi-list-ul me-1"></i> See All Students
                    </a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
