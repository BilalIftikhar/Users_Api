<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Agricultural Equipment</title>
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
    <!-- Sidebar -->
    @include('admin.partials.sidebar')


    <!-- Content Area -->
    <div class="content-area">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    Add Agricultural Equipment
                </div>
                <div class="card-body">

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Error Message -->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form for Adding Equipment -->
                    <form action="{{ route('admin.agricultural_equipment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Equipment Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input type="file" name="picture" class="form-control" id="picture">
                        </div>

                        <div class="mb-3">
                            <label for="audio_link" class="form-label">Audio Link</label>
                            <input type="text" name="audio_link" class="form-control" id="audio_link">
                        </div>

                        <div class="mb-3">
                            <label for="video_link" class="form-label">Video Link</label>
                            <input type="text" name="video_link" class="form-control" id="video_link">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Equipment</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>