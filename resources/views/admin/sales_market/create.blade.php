<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sales Market Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

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
        <h2>Add Sales Market Entry</h2>
        <form action="{{ route('admin.sales_market.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="location" class="form-control" id="location">
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
                <label for="services">Services</label>
                <input type="services" name="services" class="form-control" id="services">

            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="picture">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
            <button type="submit" class="btn btn-primary">Add Entry</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
    // Select the input field
    const servicesInput = document.querySelector('#services');

    // Initialize Tagify on the input
    new Tagify(servicesInput, {
        whitelist: [], // Optional: pre-define allowed tags
        maxTags: 1000000,   // Optional: limit number of tags
        enforceWhitelist: false, // Set to true to allow only pre-defined tags
        dropdown: {
            enabled: 1, // Show suggestions after 1 character is typed
        },
    });
</script>
</body>

</html>