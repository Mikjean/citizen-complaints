<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Engagement System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #0d6efd;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .nav-link:hover {
            color: #d1e0ff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CCES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=submit">Submit Complaint</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=track">Track Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=admin">Admin</a>
                </li>
                <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=logout">Logout (<?= htmlspecialchars($_SESSION['admin_username']) ?>)</a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <h1 class="text-center mb-4">Citizen Engagement System</h1>
