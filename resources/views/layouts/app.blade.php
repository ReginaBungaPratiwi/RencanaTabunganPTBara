{{-- <!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   


</body>
</html> --}}

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
        }

        .navbar .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .navbar-brand:hover {
            color: #e0e0e0;
        }

        .container {
            margin-top: 30px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .img-thumbnail {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
            margin-top: 30px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            font-size: 0.9rem;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* For mobile responsiveness */
        @media (max-width: 767px) {
            .container {
                padding: 15px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Rencana Tabungan</a>
    </nav>

    <!-- Content Section -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Rencana Tabungan. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

