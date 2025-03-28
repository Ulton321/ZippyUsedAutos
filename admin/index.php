<?php
require('../config.php'); // Database connection
require('models/vehicles_db.php'); // Vehicle model
require('models/makes_db.php');
require('models/types_db.php');
require('models/classes_db.php');

// Fetch all vehicles
$vehicles = get_all_vehicles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Vehicles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Manage Vehicles</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Type</th>
                <th>Class</th>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['vehicle_id']; ?></td>
                    <td><?php echo $vehicle['make_name']; ?></td>
                    <td><?php echo $vehicle['type_name']; ?></td>
                    <td><?php echo $vehicle['class_name']; ?></td>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td>$<?php echo number_format($vehicle['price'], 2); ?></td>
                    <td class="actions">
                        <a href="edit_vehicle.php?vehicle_id=<?php echo $vehicle['vehicle_id']; ?>">Edit</a>
                        <a href="delete.php?vehicle_id=<?php echo $vehicle['vehicle_id']; ?>" onclick="return confirm('Are you sure you want to delete this vehicle?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>