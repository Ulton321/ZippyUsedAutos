<?php
function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY class_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}
?>