<?php
function get_types() {
    global $db;
    $query = 'SELECT * FROM types ORDER BY type_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}
?>