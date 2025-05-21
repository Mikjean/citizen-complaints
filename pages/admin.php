<?php


// session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: index.php?page=login');
    exit;
}
require_once __DIR__ . '/../utils/sms.php';

$stmt = $pdo->query("SELECT c.id, c.citizen_name, c.message, c.status FROM complaints c");
echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Message</th><th>Status</th><th>Action</th></tr>";
foreach ($stmt as $row) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['citizen_name']}</td>
        <td>{$row['message']}</td>
        <td>{$row['status']}</td>
        <td><a href='index.php?page=admin&resolve={$row['id']}' class='btn btn-sm btn-success'>Resolve</a></td>
    </tr>";
}
echo "</table>";

if (isset($_GET['resolve'])) {
    $id = $_GET['resolve'];

    // Get user's phone and name
    $stmt = $pdo->prepare("SELECT citizen_name, phone FROM complaints WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $name = $user['citizen_name'];
        $phone = $user['phone'];

        // Update status
        $stmt = $pdo->prepare("UPDATE complaints SET status = 'Resolved' WHERE id = ?");
        $stmt->execute([$id]);

        // Send SMS
        $smsText = "Hello $name, your complaint has been resolved. Thank you for your feedback.";
        sendSMS($phone, $smsText);
    }

    header('Location: index.php?page=admin');
}
?>
