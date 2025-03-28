<?php
require('config.php');
require('models/vehicles_db.php');
require('models/makes_db.php');
require('models/types_db.php');
require('models/classes_db.php');

$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$vehicles = get_vehicles($sort, $make_id, $type_id, $class_id);
$makes = get_makes();
$types = get_types();
$classes = get_classes();

include('views/public_list.php');
?>