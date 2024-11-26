<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }

        .login-card {
            max-width: 400px;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .login-btn {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <h2 class="text-center my-4">Admin Login</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn login-btn">Login</button>
            </form>

            <p class="text-center mt-3">
                <!-- Don’t have an account? <a href="{{ route('admin.register.view') }}">Register here</a>. -->
            </p>
        </div>
    </div>
</body>

</html>