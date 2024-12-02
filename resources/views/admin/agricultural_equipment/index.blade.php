<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Equipment</title>
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
        <h2>Agricultural Equipment</h2>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Add Equipment Button -->
        <div class="mt-5">
            <a href="{{ route('admin.agricultural_equipment.create') }}" class="btn btn-primary">+ Add Equipment</a>
        </div>

        <!-- Equipment Table -->
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Audio Link</th>
                    <th>Video Link</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($equipment as $equip)
                <tr>
                    <td>{{ $loop->iteration + $equipment->firstItem() - 1 }}</td>
                    <td>{{ $equip->name }}</td>
                    <td>{{ $equip->description }}</td>
                    <td>
                        @if($equip->picture)
                        <img src="{{ asset('storage/' . $equip->picture) }}" alt="Equipment" style="max-width: 100px;">


                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                        @if($equip->audio_link)
                        <a href="{{ $equip->audio_link }}" target="_blank">Audio</a>
                        @else
                        No Audio
                        @endif
                    </td>
                    <td>
                        @if($equip->video_link)
                        <a href="{{ $equip->video_link }}" target="_blank">Video</a>
                        @else
                        No Video
                        @endif
                    </td>
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.agricultural_equipment.destroy', $equip->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this agricultural_equipment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No equipment found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $equipment->links('') }}
        </div>
    </div>
</body>

</html>