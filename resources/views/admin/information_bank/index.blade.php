<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informationn Equipment</title>
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

        <h2>Information Bank Entries</h2>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mt-5">

            <a href="{{ route('admin.information_bank.create') }}" class="btn btn-primary mb-3">+ Add Entry</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Audio Link</th>
                    <th>Video Link</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($entries as $entry)
                <tr>
                    <td>{{ $loop->iteration + $entries->firstItem() - 1 }}</td>
                    <td>{{ $entry->name }}</td>
                    <td>{{ Str::limit($entry->description, 50) }}</td>
                    <td>
                        @if($entry->picture)
                        <img src="{{ asset('storage/' . $entry->picture) }}" alt="Image" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>
                        @if($entry->audio_link)
                        <a href="{{ $entry->audio_link }}" target="_blank">Audio</a>
                        @else
                        No Audio
                        @endif
                    </td>
                    <td>
                        @if($entry->video_link)
                        <a href="{{ $entry->video_link }}" target="_blank">Video</a>
                        @else
                        No Video
                        @endif
                    </td>
                    <td>
                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('admin.information_bank.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this information_bank?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $entries->links() }}
        </div>
    </div>
</body>

</html>