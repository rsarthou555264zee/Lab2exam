<?php
require_once 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM pets WHERE pet_id = ?");
    $stmt->execute([$_GET['id']]);

    header("Location: index.php?message=Pet+deleted+successfully!");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
