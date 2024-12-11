<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="container my-5">
    <h1 class="text-center mb-4">Library Inventory</h1> <!-- Title added here -->

        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
