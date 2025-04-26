<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">

        <form action="{{ url('signUpFrom') }}" method="post" class="w-50 mx-auto mt-4 border rounded shadow-sm bg-white">
            <h4 class="bg-success text-white text-center p-3 m-0 rounded-top">Sign Up Form</h4>
            @csrf
            <div class="p-4 ">
                <div class="mb-3">
                    <label for="userName" class="form-label">User Name</label>
                    <input type="text" name="userName" class="form-control" id="userName">
                </div>

                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="number" name="phoneNumber" class="form-control" id="phoneNumber">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-25 m-0 text-center">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>