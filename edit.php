<?php
require_once 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$pet_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM pets WHERE pet_id = ?");
$stmt->execute([$pet_id]);
$pet = $stmt->fetch();

if (!$pet) {
    header("Location: index.php?message=Pet+not+found!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 500px;">
        <div class="card">
            <h2 class="title" style="margin-bottom: 20px;">Edit Pet #<?= htmlspecialchars($pet['pet_id']) ?></h2>

            <!-- Changed method to GET -->
            <form action="update.php" method="GET">
                <input type="hidden" name="pet_id" value="<?= htmlspecialchars($pet['pet_id']) ?>">

                <div class="form-group">
                    <label>Pet Name</label>
                    <input type="text" name="pet_name" value="<?= htmlspecialchars($pet['pet_name']) ?>" required class="form-control">
                </div>

                <div class="form-group">
                    <label>Species</label>
                    <input type="text" name="pet_species" value="<?= htmlspecialchars($pet['pet_species']) ?>" required class="form-control">
                </div>

                <div class="form-group">
                    <label>Breed</label>
                    <input type="text" name="pet_breed" value="<?= htmlspecialchars($pet['pet_breed']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Age (Years)</label>
                    <input type="number" name="pet_age" min="0" value="<?= htmlspecialchars($pet['pet_age']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <select name="pet_gender" class="form-control">
                        <option value="Male" <?= $pet['pet_gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $pet['pet_gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-warning">Update Pet</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>