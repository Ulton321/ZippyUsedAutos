<?php
require('../models/vehicles_db.php');

$vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
if ($vehicle_id) {
    $vehicle = get_vehicle($vehicle_id);
    $make_id = $vehicle['make_id'];
    $type_id = $vehicle['type_id'];
    $class_id = $vehicle['class_id'];
    $price = $vehicle['price'];
    $year = $vehicle['year'];
} else {
    // Handle the error if vehicle_id is not valid
    $error = "Invalid vehicle ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
</head>
<body>
    <h1>Edit Vehicle</h1>
    <form action="update_vehicle.php" method="post">
        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">
        <label for="make_id">Make:</label>
        <input type="text" name="make_id" id="make_id" value="<?php echo $make_id; ?>"><br>
        <label for="type_id">Type:</label>
        <input type="text" name="type_id" id="type_id" value="<?php echo $type_id; ?>"><br>
        <label for="class_id">Class:</label>
        <input type="text" name="class_id" id="class_id" value="<?php echo $class_id; ?>"><br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>"><br>
        <label for="year">Year:</label>
        <input type="text" name="year" id="year" value="<?php echo $year; ?>"><br>
        <input type="submit" value="Update Vehicle">
    </form>
</body>
</html>