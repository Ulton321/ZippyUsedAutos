<?php
require('../config.php');
require('models/vehicles_db.php');
require('models/classes_db.php'); // Add this to fetch class names
require('models/makes_db.php');   // Add this to fetch make names
require('models/types_db.php');   // Add this to fetch type names

$vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
if (!$vehicle_id) {
    echo "Invalid vehicle ID.";
    exit();
}

$vehicle = get_vehicle($vehicle_id);
$classes = get_all_classes(); // Fetch all classes
$makes = get_all_makes();     // Fetch all makes
$types = get_all_types();     // Fetch all types

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    update_vehicle($vehicle_id, $make_id, $type_id, $class_id, $year, $model, $price);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        select, input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Edit Vehicle</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="make_id">Make:</label>
            <select name="make_id" id="make_id" required>
                <?php foreach ($makes as $make): ?>
                    <option value="<?php echo $make['make_id']; ?>" <?php echo $make['make_id'] == $vehicle['make_id'] ? 'selected' : ''; ?>>
                        <?php echo $make['make_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="type_id">Type:</label>
            <select name="type_id" id="type_id" required>
                <?php foreach ($types as $type): ?>
                    <option value="<?php echo $type['type_id']; ?>" <?php echo $type['type_id'] == $vehicle['type_id'] ? 'selected' : ''; ?>>
                        <?php echo $type['type_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id" required>
                <?php foreach ($classes as $class): ?>
                    <option value="<?php echo $class['class_id']; ?>" <?php echo $class['class_id'] == $vehicle['class_id'] ? 'selected' : ''; ?>>
                        <?php echo $class['class_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" value="<?php echo $vehicle['year']; ?>" required>
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="<?php echo $vehicle['model']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo $vehicle['price']; ?>" required>
        </div>
        <input type="submit" value="Update Vehicle">
    </form>
</body>
</html>