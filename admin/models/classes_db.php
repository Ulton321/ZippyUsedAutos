<?php
function get_all_classes() {
    global $db; // Assuming $db is your database connection object
    $query = 'SELECT * FROM classes ORDER BY class_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}
?>