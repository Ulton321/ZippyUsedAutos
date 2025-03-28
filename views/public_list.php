<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        main {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            margin-top: 0;
            font-size: 2rem;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }
        label {
            font-weight: bold;
            margin-right: 10px;
        }
        select, input, button {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        select, input {
            flex: 1;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Zippy Used Autos</h1>
    </header>
    <main>
        <form action="index.php" method="get">
            <label for="make_id">Make:</label>
            <select name="make_id" id="make_id">
                <option value="">All</option>
                <?php foreach ($makes as $make) : ?>
                    <option value="<?php echo $make['make_id']; ?>" <?php echo ($make_id == $make['make_id']) ? 'selected' : ''; ?>>
                        <?php echo $make['make_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="type_id">Type:</label>
            <select name="type_id" id="type_id">
                <option value="">All</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['type_id']; ?>" <?php echo ($type_id == $type['type_id']) ? 'selected' : ''; ?>>
                        <?php echo $type['type_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id">
                <option value="">All</option>
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['class_id']; ?>" <?php echo ($class_id == $class['class_id']) ? 'selected' : ''; ?>>
                        <?php echo $class['class_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="min_price">Min Price:</label>
            <input type="number" name="min_price" id="min_price" placeholder="Min Price" value="<?php echo isset($min_price) ? $min_price : ''; ?>">

            <label for="max_price">Max Price:</label>
            <input type="number" name="max_price" id="max_price" placeholder="Max Price" value="<?php echo isset($max_price) ? $max_price : ''; ?>">

            <button type="submit">Filter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?php echo $vehicle['year']; ?></td>
                        <td><?php echo $vehicle['model']; ?></td>
                        <td>$<?php echo number_format($vehicle['price'], 2); ?></td>
                        <td><?php echo $vehicle['make_name']; ?></td>
                        <td><?php echo $vehicle['type_name']; ?></td>
                        <td><?php echo $vehicle['class_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>