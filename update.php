<?php
require_once 'db.php';

if (isset($_GET['pet_id']) && !empty($_GET['pet_id'])) {
    $stmt = $pdo->prepare("UPDATE pets SET pet_name = ?, pet_species = ?, pet_breed = ?, pet_age = ?, pet_gender = ? WHERE pet_id = ?");
    $stmt->execute([
        $_GET['pet_name'],
        $_GET['pet_species'],
        $_GET['pet_breed'] ?? null,
        $_GET['pet_age'] ?? null,
        $_GET['pet_gender'] ?? 'Male',
        $_GET['pet_id']
    ]);

    header("Location: index.php?message=Pet+updated+successfully!");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
