<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Market List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
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
            padding: 12px 20px;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 4px;
        }

        .content-area {
            margin-left: 270px;
            padding: 40px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
            padding: 15px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card-body {
            padding: 20px 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('admin.partials.sidebar')

    <div class="container mt-5 me-5">
        <h2>Sales Market List</h2>
        <div class="mt-3">

            <a href="{{ route('admin.sales_market.create') }}" class="btn btn-primary mb-3">+ Add Entry</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Services</th>
                    <th>Picture</th>
                    <th>Location</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salesMarkets as $market)
                <tr>
                    <td>{{ $loop->iteration + $salesMarkets->firstItem() - 1 }}</td>
                    <td>{{ $market->name }}</td>
                    <td>{{ $market->city->name }}</td>
                    <td>{{ $market->services }}</td>

                    <td>
                        @if($market->picture)
                        <img src="{{ asset('storage/' . $market->picture) }}" alt="Picture" style="width: 100px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>{{ $market->location }}</td>
                    <td>{{ $market->phone_number }}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $salesMarkets->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>