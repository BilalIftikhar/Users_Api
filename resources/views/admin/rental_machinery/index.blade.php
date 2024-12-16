<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Machinery List</title>
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
        <h2 class="mb-4">Rental Machinery List</h2>

        <!-- Add Machinery Button -->
        <a href="{{ route('admin.rental_machinery.create') }}" class="btn btn-primary mb-3">+ Add Machinery</a>

        <!-- Table for Machinery List -->
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
                    <th>Action</th>




                </tr>
            </thead>
            <tbody>
                @forelse($machineries as $machinery)
                <tr>
                    <td>{{ $loop->iteration + $machineries->firstItem() - 1 }}</td>
                    <td>{{ $machinery->name }}</td>
                    <td>{{ $machinery->city->name }}</td>
                    <td>
                        {{ is_array(json_decode($machinery->services, true)) 
                            ? implode(',', json_decode($machinery->services, true)) 
                            : $machinery->services }}
                    </td>
                    <td>
                        @if($machinery->picture)
                        <img src="{{ asset('storage/' . $machinery->picture) }}" alt="Image" style="max-width: 100px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>{{ $machinery->location }}</td>
                    <td>{{ $machinery->phone_number }}</td>
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.rental_machinery.destroy', $machinery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rental machinery?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No machineries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $machineries->links() }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>