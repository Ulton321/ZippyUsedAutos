<?php
require_once('../models/vehicles_db.php');

class AdminVehiclesController {
    public function index() {
        $vehicles = VehiclesDB::getAllVehicles();
        include('../views/vehicles_list.php');
    }

    public function delete() {
        $vehicle_id = $_POST['vehicle_id'];
        VehiclesDB::deleteVehicle($vehicle_id);
        header('Location: /admin/vehicles');
    }
}
?>