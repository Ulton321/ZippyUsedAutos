<?php
require('../config.php');
require('models/vehicles_db.php');

$vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
if ($vehicle_id) {
    delete_vehicle($vehicle_id);
    header('Location: index.php');
    exit();
} else {
    echo "Invalid vehicle ID.";
    exit();
}
?>