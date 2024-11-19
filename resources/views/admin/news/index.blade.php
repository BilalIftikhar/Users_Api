<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
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
    @include('admin.partials.sidebar')

    <div class="container mt-5 me-5">
        <h2 class="my-4">News List</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">+ Add News</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Picture</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $newsItem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->date }}</td>
                    <td><img src="{{ asset('storage/'.$newsItem->picture) }}" alt="news image" width="100"></td>
                    <td>{{ $newsItem->detail }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>