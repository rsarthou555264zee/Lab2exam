<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 500px;">
        <div class="card">
            <h2 class="title" style="margin-bottom: 20px;">Add New Pet</h2>

            <!-- Changed method to GET -->
            <form action="store.php" method="GET">
                <div class="form-group">
                    <label>Pet Name</label>
                    <input type="text" name="pet_name" required class="form-control">
                </div>

                <div class="form-group">
                    <label>Species</label>
                    <input type="text" name="pet_species" required class="form-control">
                </div>

                <div class="form-group">
                    <label>Breed</label>
                    <input type="text" name="pet_breed" class="form-control">
                </div>

                <div class="form-group">
                    <label>Age (Years)</label>
                    <input type="number" name="pet_age" min="0" class="form-control">
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <select name="pet_gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Pet</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>