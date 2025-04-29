<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card p-4 shadow-sm">
                <h4>Send an Email</h4>
                <form action="{{ route('send_mail') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="to" class="form-label">To</label>
                        <input type="email" class="form-control" name="to" id="to" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
