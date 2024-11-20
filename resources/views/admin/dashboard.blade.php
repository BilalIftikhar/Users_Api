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
        .graph-placeholder {
            height: 200px;
            background-color: #f5f5f5;
            border: 1px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #777;
            font-size: 1.2rem;
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
                            <a class="nav-link" href="{{ route('admin.city.index') }}"> City</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.crop.index') }}"> Crop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.agricultural_equipment.index') }}">Agriculture Equipment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.information_bank.index') }}">Information bank </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rental_machinery.index') }}">Rental machinery  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.sales_market.index') }}">Sale Market  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.company.index') }}">Company  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.fao.index') }}">FAO  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.news.index') }}">News  </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 content">
                <h2 class="dashboard-heading mt-4">Welcome to the Admin Dashboard</h2>
                <p class="lead">Monitor system activity, manage data, and view reports here.</p>

                <!-- Recent Activity Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        Recent Activity
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>New city *Lahore* added to the database.</li>
                            <li>FAO entry for *Agriculture Tips* created.</li>
                            <li>Rental machinery listing for *Tractor Model X* added.</li>
                            <li>User *Jane Doe* updated their profile.</li>
                        </ul>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Statistics Overview
                            </div>
                            <div class="card-body">
                                <p>Total Cities: 25</p>
                                <p>Total FAO Entries: 15</p>
                                <p>Total Rental Machinery Listings: 12</p>
                                <p>Sales Market Listings: 8</p>
                                <p>News Articles Published: 10</p>
                            </div>
                        </div>
                    </div>

                    <!-- Placeholder for Chart -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                User Registrations
                            </div>
                            <div class="card-body">
                                <div class="graph-placeholder">Graph: User Registrations Over Time</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphs and Reports Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Cities Overview
                            </div>
                            <div class="card-body">
                                <div class="graph-placeholder">Graph: Cities Added</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                FAO Insights
                            </div>
                            <div class="card-body">
                                <div class="graph-placeholder">Graph: FAO Entries Trends</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reports Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        System Reports
                    </div>
                    <div class="card-body">
                        <p><strong>Last Backup:</strong> 2024-11-19 10:45 AM</p>
                        <p><strong>System Status:</strong> Operational</p>
                        <p><strong>Upcoming Tasks:</strong></p>
                        <ul>
                            <li>Integrate API for external news sources.</li>
                            <li>Update Rental Machinery listing module.</li>
                            <li>Review new user feedback.</li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>