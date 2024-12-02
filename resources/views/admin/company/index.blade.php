<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
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
    @include('admin.partials.sidebar')

    <div class="container mt-5 me-5">
        <h2>Company List</h2>
        <div class=" mt-3">

            <a href="{{ route('admin.company.create') }}" class="btn btn-primary mb-3">+ Add Company</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Location</th>
                    <th>Phone Number</th>
                    <th>Website Link</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                <tr>
                    <td>{{ $loop->iteration + $companies->firstItem() - 1 }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->city->name }}</td>
                    <td>{{ $company->services }}</td>

                    <td>
                        @if($company->picture)
                        <img src="{{ asset('storage/' . $company->picture) }}" alt="Picture" style="width: 100px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>{{ $company->location }}</td>
                    <td>{{ $company->phone_number }}</td>
                    <td>
                        @if($company->website_link)
                        <a href="{{ $company->website_link }}" target="_blank" rel="noopener noreferrer">
                            {{ $company->website_link }}
                        </a>
                        @else
                        No Website
                        @endif
                    </td>
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No companies found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>
</body>

</html>