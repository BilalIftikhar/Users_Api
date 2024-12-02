<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company</title>
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
        <h2>Add Company</h2>
        <form action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" required>
            </div>
            <div class="mb-3">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" required>
            </div>
            <div class="mb-3">
                <label for="city_id">City</label>
                <select name="city_id" class="form-control" id="city_id" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="services">Description</label>
                <textarea name="services" class="form-control" id="services" required></textarea>
            </div>
            <div class="mb-3">
                <label for="website_link">Website Link</label>
                <input type="url" name="website_link" class="form-control" id="website_link">
            </div>
            <div class="mb-3">
                <label for="picture">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
            <button type="submit" class="btn btn-primary">Add Company</button>
        </form>
    </div>
</body>

</html>
