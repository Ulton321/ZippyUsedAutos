<?php include 'includes/header.php'; ?>

<h2>Vehicle List</h2>

<form action="." method="get" id="make_selection">
    <label>Sort by:</label>
    <select name="sort">
        <option value="price">Price (Most Expensive to Least Expensive)</option>
        <option value="year">Year (Newest to Oldest)</option>
    </select>
    <input type="submit" value="Sort">
</form>

<form action="." method="get" id="filter_selection">
    <label>Filter by Make:</label>
    <select name="make_id">
        <option value="">View All</option>
        <?php foreach ($makes as $make) : ?>
        <option value="<?php echo $make['make_id']; ?>">
            <?php echo $make['make_name']; ?>
        </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Filter">
</form>

<table>
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Class</th>
        <th>Type</th>
        <th>Price</th>
    </tr>
    <?php foreach ($vehicles as $vehicle) : ?>
    <tr>
        <td><?php echo $vehicle['year']; ?></td>
        <td><?php echo $vehicle['make_name']; ?></td>
        <td><?php echo $vehicle['model']; ?></td>
        <td><?php echo $vehicle['class_name']; ?></td>
        <td><?php echo $vehicle['type_name']; ?></td>
        <td><?php echo '$' . number_format($vehicle['price'], 2); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'includes/footer.php'; ?>