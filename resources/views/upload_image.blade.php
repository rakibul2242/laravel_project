<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                        data-image_path="{{ $student->images->first()->image_path ?? '' }}">
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

                        @if(session('image_path'))
                        <div class="card mt-3 p-3 uploaded_image">
                            <p><b>Student ID: {{ session('student_id') }}</b></p>
                            <p>Uploaded file: {{ session('image_path') }}</p>
                            <img src="{{ asset('storage/images/' . session('image_path')) }}" alt="Uploaded Image" class="img-fluid">
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

    <script>
        // jQuery to update image preview when student id changes
        $('#student_id').change(function() {
            var selectedOption = $(this).find('option:selected');
            var image_path = selectedOption.data('image_path');

            // Update the image preview if an image path is available
            if (image_path) {
                $('#id_student_image').attr('src', '/storage/images/' + image_path);
                $('.uploaded_image').addClass('d-none');  // Hide uploaded image section
            } else {
                $('#id_student_image').attr('src', '');  // Clear image if no path is available
            }
        });

        // jQuery to preview selected file before upload (live preview)
        $('#image').change(function(event) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#id_student_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);  // Read the file as DataURL
        });
    </script>
</body>

</html>
