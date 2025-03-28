<!DOCTYPE html>
<html>
<head>
    <title>Manage Makes</title>
</head>
<body>
    <h1>Manage Makes</h1>
    <form action="makes.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="make_name">Make Name:</label>
        <input type="text" name="make_name" id="make_name">
        <button type="submit">Add Make</button>
    </form>
    <table>
        <tr>
            <th>Make</th>
            <th>Action</th>
        </tr>
        <?php foreach ($makes as $make) : ?>
            <tr>
                <td><?php echo $make['make_name']; ?></td>
                <td>
                    <form action="makes.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="make_id" value="<?php echo $make['make_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>