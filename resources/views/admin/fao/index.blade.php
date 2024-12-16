<!DOCTYPE html>
<html>

<head>
    <title>FAO List</title>
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
        <h2>FAO List</h2>
        <div class=" mt-3">

            <a href="{{ route('admin.fao.create') }}" class="btn btn-primary mb-3">+ Add FAO</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                @forelse($faos as $fao)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fao->name }}</td>
                    <td>{{ $fao->city->name }}</td>
                    <td>{{ implode(', ', $fao->services) }} </td>

                    <td>
                        @if($fao->picture)
                        <img src="{{ asset('storage/' . $fao->picture) }}" alt="Image" style="max-width: 100px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>{{ $fao->location }}</td>
                    <td>{{ $fao->phone_number }}</td>
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.fao.destroy', $fao->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Fao?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $faos->links() }}
    </div>
</body>

</html>