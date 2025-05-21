<?php
// session_start();
require_once __DIR__ .'/../db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);


    // echo $admin['password'],$password ;
    // var_dump(password_verify($password, $admin['password']));
    // die();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: index.php?page=admin');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<form method="POST" class="w-25 mx-auto mt-5">
    <h3 class="text-center">Admin Login</h3>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>
