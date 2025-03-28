<?php
function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}
?>