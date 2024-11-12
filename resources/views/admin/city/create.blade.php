<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content-area {
            margin-left: 250px;
            padding: 40px;
        }

        .card {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
            padding: 15px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">Admin Panel</h3>
        <ul class="list-unstyled">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.city.create') }}">Add City</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.crop.create') }}">Add Crop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.agricultural_equipment.create') }}">Add Agriculture Equipment</a>
            </li>
        </ul>
    </div>

    <div class="content-area">
        <div class="container">
            <div class="card">
                <div class="card-header">Add City</div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Error Message -->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form for Adding Crop -->
                    <form action="{{ route('admin.city.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">City Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add City</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

</body>

</html>