<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Tabungan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
        }

        .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #e0e0e0;
        }

        /* Main container */
        .main-container {
            margin-top: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Buttons */
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

        /* Tables */
        .table {
            margin-top: 30px;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        /* Footer */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive tweaks */
        @media (max-width: 767px) {
            .main-container {
                padding: 20px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Rencana Tabungan</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="main-container">
            @yield('content') <!-- Placeholder untuk konten dinamis -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Rencana Tabungan. All Rights Reserved. | <a href="#">Kebijakan Privasi</a></p>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
