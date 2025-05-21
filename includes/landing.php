<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

.material-icons{
    font-size: 60px!important;
}

.navbar navbar-expand-lg navbar-custom {
    display:none;
}



</style>

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        <!-- Home -->
        <div class="col">
            <a href="index.php" class="text-decoration-none">
                <div class="card text-white bg-primary h-100 shadow">
                    <div class="card-body text-center">
                        <span class="material-icons md-48">home</span>
                        <h5 class="card-title mt-2">Home</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Submit Complaint -->
        <div class="col">
            <a href="index.php?page=submit" class="text-decoration-none">
                <div class="card text-white bg-danger h-100 shadow">
                    <div class="card-body text-center">
                        <span class="material-icons md-48">report_problem</span>
                        <h5 class="card-title mt-2">Submit Complaint</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Track Status -->
        <div class="col">
            <a href="index.php?page=track" class="text-decoration-none">
                <div class="card text-white bg-warning h-100 shadow">
                    <div class="card-body text-center">
                        <span class="material-icons md-48">track_changes</span>
                        <h5 class="card-title mt-2">Track Status</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Admin -->
        <div class="col">
            <a href="index.php?page=admin" class="text-decoration-none">
                <div class="card text-white bg-success h-100 shadow">
                    <div class="card-body text-center">
                        <span class="material-icons md-48">admin_panel_settings</span>
                        <h5 class="card-title mt-2">Admin</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Logout (conditionally rendered) -->
        <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
        <div class="col">
            <a href="index.php?page=logout" class="text-decoration-none">
                <div class="card text-white bg-dark h-100 shadow">
                    <div class="card-body text-center">
                        <span class="material-icons md-48">logout</span>
                        <h5 class="card-title mt-2">Logout (<?= htmlspecialchars($_SESSION['admin_username']) ?>)</h5>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
