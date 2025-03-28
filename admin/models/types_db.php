<?php
function get_all_types() {
    global $db; // Assuming $db is your database connection object
    $query = 'SELECT * FROM types ORDER BY type_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}
?>