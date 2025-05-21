<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../utils/sms.php';

$categories = $pdo->query("SELECT id, name FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$agencies = $pdo->query("SELECT id, name FROM agencies")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['citizen_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $category_id = $_POST['category_id'];
    $agency_id = $_POST['agency_id'];

    function generateTrackingId($length = 5) {
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
    }
    $tracking_id = generateTrackingId();

    $stmt = $pdo->prepare("INSERT INTO complaints (citizen_name, email, phone, message, category_id, agency_id,tracking_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $message, $category_id, $agency_id,$tracking_id]);

    $smsText = "Thank you $name, your complaint has been received. tracking ID: $tracking_id";
    sendSMS($phone, $smsText);

    echo "<div class='alert alert-success'>Complaint submitted successfully! $tracking_id</div>";
}


?>
<form method="POST">
    <input class="form-control mb-2" name="citizen_name" placeholder="Your Name" required>
    <input class="form-control mb-2" name="email" type="email" placeholder="Your Email" required>
    <input class="form-control mb-2" name="phone" type="text" placeholder="Your Phone Number" required>
    <textarea class="form-control mb-2" name="message" placeholder="Your Complaint" required></textarea>
    <select class="form-control mb-2" name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <select class="form-control mb-2" name="agency_id">
        <?php foreach ($agencies as $agency): ?>
            <option value="<?= $agency['id'] ?>"><?= htmlspecialchars($agency['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>