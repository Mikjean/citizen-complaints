<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ticket_id'];
    $stmt = $pdo->prepare("SELECT * FROM complaints WHERE tracking_id = ?");
    $stmt->execute([$id]);
    $ticket = $stmt->fetch();
    if ($ticket) {
        echo "<p>Mr <b> {$ticket['citizen_name']} </b> your Complaint is : <strong>{$ticket['status']}</strong></p>";
        
    } else {
        echo "<p class='text-danger'>Ticket not found.</p>";
    }
}
?>
<form method="POST">
    <input class="form-control mb-2" name="ticket_id" placeholder="Enter Ticket ID" required>
    <button class="btn btn-primary" type="submit">Track</button>
</form>
