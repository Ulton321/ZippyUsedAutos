<?php
function get_all_vehicles() {
    global $db;
    $query = 'SELECT v.*, m.make_name, t.type_name, c.class_name
              FROM vehicles v
              JOIN makes m ON v.make_id = m.make_id
              JOIN types t ON v.type_id = t.type_id
              JOIN classes c ON v.class_id = c.class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

function get_vehicle($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    return $statement->fetch();
}

function update_vehicle($vehicle_id, $make_id, $type_id, $class_id, $year, $model, $price) {
    global $db;
    $query = 'UPDATE vehicles
              SET make_id = :make_id, type_id = :type_id, class_id = :class_id,
                  year = :year, model = :model, price = :price
              WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}
?>