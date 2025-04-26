<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Students &amp; Results</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-info">
    <div class="container mt-5 mb-5">

        {{-- flash alerts --}}
        @foreach (['error'=>'danger','success'=>'success','warning'=>'warning'] as $key => $type)
        @if(session($key))
        <div class="alert response-alert alert-{{ $type }} alert-dismissible fade show shadow-sm">
            {{ session($key) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @endforeach

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success-subtle text-center">
                <h4 class="mb-0">Students – {{ $students->count() }}</h4>
            </div>

            <div class="card-body p-0">
                @if($students->isEmpty())
                <div class="alert alert-warning text-center mb-0">No student data found.</div>
                @else
                <div class="table-responsive rounded-bottom ">
                    <table class="table table-bordered table-striped m-0 align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Roll</th>
                                <th rowspan="2">Section</th>
                                <th rowspan="2">Phone</th>
                                <th rowspan="2">Address</th>
                                <th class="text-center" colspan="4">Results</th>
                                <th rowspan="2">Actions</th>
                            </tr>
                            <tr class="table-dark">
                                <th>Course</th>
                                <th>Code</th>
                                <th>Teacher</th>
                                <th>Grade</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $student)
                            {{-- first result row (or blank placeholders) --}}
                            @php $first = $student->results->first(); @endphp
                            <tr class="text-center">
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->id }}</td>
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->name }}</td>
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->roll }}</td>
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->section }}</td>
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->phone_number }}</td>
                                <td rowspan="{{ max(1,$student->results->count()) }}">{{ $student->address }}</td>

                                @if($first)
                                <td>{{ $first->course_name }}</td>
                                <td>{{ $first->course_code }}</td>
                                <td>{{ $first->teacher }}</td>
                                <td>{{ $first->result }}</td>
                                @else
                                <td colspan="4" class="text-muted">No results yet</td>
                                @endif

                                {{-- action buttons (only once per student) --}}
                                <td rowspan="{{ max(1,$student->results->count()) }}">
                                    <a href="{{ url('student_view/'.$student->id) }}" class="btn btn-info btn-sm mb-1">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ url('student_edit/'.$student->id) }}" class="btn btn-warning btn-sm mb-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#del{{ $student->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- extra result rows for this student --}}
                            @foreach($student->results->skip(1) as $r)
                            <tr class="text-center">
                                <td>{{ $r->course_name }}</td>
                                <td>{{ $r->course_code }}</td>
                                <td>{{ $r->teacher }}</td>
                                <td>{{ $r->result }}</td>
                            </tr>
                            @endforeach

                            {{-- delete modal --}}
                            <div class="modal fade" id="del{{ $student->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $student->name }}?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confirm deletion of this student and all their results.
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ url('student_delete/'.$student->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $students->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <a href="{{ url('student_form') }}" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Add Student
            </a>
        </div>
    </div>

    {{-- fade‑out alerts --}}
    <script>
        setTimeout(() => $('.response-alert').fadeOut(500, function() {
            $(this).remove();
        }), 3000);
    </script>
</body>

</html>