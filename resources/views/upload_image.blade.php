<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Image Upload</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('upload_image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student Id</label>
                                <select class="form-control" name="student_id" id="student_id" required>
                                    <option value="" disabled selected>Select Student ID</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}"
                                        data-filename="{{ $student->images->first()->filename ?? '' }}">
                                        {{ $student->id }} : {{ $student->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Choose an image</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                        <!-- Display the previously uploaded image (if any) -->
                        @if(isset($image))
                        <div class="mt-4">
                            <p><b>Selected Student Image:</b></p>
                            <img src="{{ asset('storage/images/' . $image->filename) }}" alt="Student Image" class="img-fluid">
                        </div>
                        @endif

                        @if(session('filename'))
                        <div class="card mt-3 p-3">
                            <p><b>Student ID: {{ session('student_id') }}</b></p>
                            <p>Uploaded file: {{ session('filename') }}</p>
                            <img src="{{ asset('storage/images/' . session('filename')) }}" alt="Uploaded Image" class="img-fluid">
                        </div>
                        @endif
                        <div class="card mt-3 p-3">
                            <img src="" alt="No Image" id="id_student_image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('student_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var filename = selectedOption.getAttribute('data-filename');

            // Update the image source if a filename is available
            if (filename) {
                document.getElementById('id_student_image').src = '/storage/images/' + filename;
            } else {
                document.getElementById('id_student_image').src = ''; // Clear image if no file
            }
        });
    </script>

</body>

</html>