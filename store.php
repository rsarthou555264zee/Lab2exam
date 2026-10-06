<?php
require_once 'db.php';

if (isset($_GET['pet_name']) && isset($_GET['pet_species'])) {
    $stmt = $pdo->prepare("INSERT INTO pets (pet_name, pet_species, pet_breed, pet_age, pet_gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_GET['pet_name'],
        $_GET['pet_species'],
        $_GET['pet_breed'] ?? null,
        $_GET['pet_age'] ?? null,
        $_GET['pet_gender'] ?? 'Male'
    ]);

    header("Location: index.php?message=Pet+added+successfully!");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
