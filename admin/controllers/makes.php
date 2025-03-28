<?php
require('../../config.php');
require('../../models/makes_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == 'add') {
    $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
    if ($make_name) {
        add_make($make_name);
    }
} elseif ($action == 'delete') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if ($make_id) {
        delete_make($make_id);
    }
}

$makes = get_makes();
include('../views/makes_list.php');
?>