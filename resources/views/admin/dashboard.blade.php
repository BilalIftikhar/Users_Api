<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: #ffffff;
            padding-top: 20px;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px;
            font-weight: 600;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            padding: 20px;
        }

        .dashboard-heading {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <h3 class="text-center">Admin Dashboard</h3>
                <div class="sidebar">
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
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 content">
                <h2 class="dashboard-heading">Welcome to the Admin Dashboard</h2>
                <p class="lead">Here you can manage users, view reports, and adjust settings.</p>

                <!-- Example of dashboard content -->
                <div class="card mb-4">
                    <div class="card-header">
                        Recent Activity
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>User John Doe registered an account.</li>
                            <li>User Jane Smith updated her profile.</li>
                            <li>Admin settings were changed.</li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Statistics
                    </div>
                    <div class="card-body">
                        <p>Total Users: 150</p>
                        <p>New Registrations Today: 5</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>