<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border border-success rounded-3">
                    <div class="card-header bg-success text-white text-center fw-bold fs-5">
                        Submitted Information
                    </div>
                    <div class="card-body bg-white">
                        <div class="mb-3 border-bottom">
                            <label class="form-label fw-bold">Name:</label>
                            <p class="d-inline form-control-plaintext">{{ $name }}</p>
                        </div>
                        <div class="mb-3 border-bottom">
                            <label class="form-label fw-bold">Phone:</label>
                            <p class="d-inline form-control-plaintext">{{ $phone }}</p>
                        </div>
                        <div class="mb-3 border-bottom">
                            <label class="form-label fw-bold">Address:</label>
                            <p class="d-inline form-control-plaintext">{{ $address }}</p>
                        </div>
                        <div class="mb-3 border-bottom">
                            <label class="form-label fw-bold">Password:</label>
                            <p class="d-inline form-control-plaintext">{{ $password }}</p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ url('signup') }}" class="btn btn-outline-success">Back to Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
