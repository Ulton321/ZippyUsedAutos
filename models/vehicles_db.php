<?php
function get_vehicles($sort = 'price', $make_id = null, $type_id = null, $class_id = null) {
    global $db;
    $query = 'SELECT v.*, m.make_name, t.type_name, c.class_name
              FROM vehicles v
              JOIN makes m ON v.make_id = m.make_id
              JOIN types t ON v.type_id = t.type_id
              JOIN classes c ON v.class_id = c.class_id';
    $conditions = [];
    if ($make_id) {
        $conditions[] = 'v.make_id = :make_id';
    }
    if ($type_id) {
        $conditions[] = 'v.type_id = :type_id';
    }
    if ($class_id) {
        $conditions[] = 'v.class_id = :class_id';
    }
    if ($conditions) {
        $query .= ' WHERE ' . implode(' AND ', $conditions);
    }
    if ($sort == 'year') {
        $query .= ' ORDER BY v.year DESC';
    } else {
        $query .= ' ORDER BY v.price DESC';
    }
    $statement = $db->prepare($query);
    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    if ($type_id) {
        $statement->bindValue(':type_id', $type_id);
    }
    if ($class_id) {
        $statement->bindValue(':class_id', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
?>