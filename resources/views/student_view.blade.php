<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-info">
    <div class="container m-auto mt-5 w-75">
        <div class="card shadow-lg border-2">
            <div class="card-header bg-info text-white text-center">
                <h4 class="mb-0">Student Details</h4>
            </div>
            <div class="card-body p-4">
                <!-- Student Information -->
                <div class="mb-3">
                    <p class="border-bottom pb-2"><strong>ID:</strong> {{ $student->id }}</p>
                    <p class="border-bottom pb-2"><strong>Name:</strong> {{ $student->name }}</p>
                    <p class="border-bottom pb-2"><strong>Roll:</strong> {{ $student->roll }}</p>
                    <p class="border-bottom pb-2"><strong>Section:</strong> {{ $student->section }}</p>
                    <p class="border-bottom pb-2"><strong>Phone Number:</strong> {{ $student->phone_number }}</p>
                    <p class="border-bottom pb-2"><strong>Address:</strong> {{ $student->address }}</p>
                </div>
                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url('student_edit/'.$student->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit Student
                    </a>
                    <a href="{{ url('studentList') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-return-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>