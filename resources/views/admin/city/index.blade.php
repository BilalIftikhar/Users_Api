<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City List</title>
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

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination .page-item .page-link {
            color: #007bff;
        }

        .pagination .page-item .page-link:hover {
            background-color: #0056b3;
            color: white;
        }

        .pagination-lg .page-link {
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .card {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .alert-empty {
            font-size: 18px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    @include('admin.partials.sidebar')


    <!-- Content Area -->
    <div class="content-area">
        <div class="container">
            <h2 class="mb-4">City List</h2>

            <!-- Add City Button -->
            <div class="mb-3">
                <a href="{{ route('admin.city.create') }}" class="btn btn-primary">+ Add City</a>
            </div>

            <!-- City Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cities as $city)
                            <tr>
                                <td>{{ $loop->iteration + $cities->firstItem() - 1 }}</td>
                                <td>{{ $city->name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="alert-empty">No cities found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">

                        {{ $cities->links() }}

                    </div>
                </div>
            </div>

        </div>
    </div>