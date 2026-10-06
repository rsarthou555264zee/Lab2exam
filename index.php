<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM pets ORDER BY pet_id ASC");
$pets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Information System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Pet Information System</h1>
            <a href="create.php" class="btn btn-primary">+ Add New Pet</a>
        </div>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert">
                <?= htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($pets) > 0): ?>
                        <?php foreach ($pets as $pet): ?>
                            <tr>
                                <td><?= htmlspecialchars($pet['pet_id']) ?></td>
                                <td><strong><?= htmlspecialchars($pet['pet_name']) ?></strong></td>
                                <td><?= htmlspecialchars($pet['pet_species']) ?></td>
                                <td><?= htmlspecialchars($pet['pet_breed']) ?></td>
                                <td><?= htmlspecialchars($pet['pet_age']) ?></td>
                                <td><?= htmlspecialchars($pet['pet_gender']) ?></td>
                                <td class="actions">
                                    <a href="edit.php?id=<?= $pet['pet_id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id=<?= $pet['pet_id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">No pets found in database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
