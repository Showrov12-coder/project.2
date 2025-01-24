<?php
session_start();
include("db.php"); // Include your database connection file

// Fetch pharmacy data from the database
$query = "SELECT * FROM pharmacies ORDER BY name ASC";
$result = mysqli_query($conn, $query);

// Check if any pharmacies exist
if (mysqli_num_rows($result) > 0) {
    $pharmacies = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pharmacies[] = $row;
    }
} else {
    $pharmacies = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy List in Dhaka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px auto;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f8f9fa;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .btn-map {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color:rgb(167, 137, 40);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-map:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Pharmacy List in Dhaka</h1>
    <h2><br>Sample List ................</br></h2>

    <?php if (count($pharmacies) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Seiral NO</th>
                <th>Pharmacy Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Location</th>
<!--            <th>Doctor Information</th>     -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacies as $index => $pharmacy): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($pharmacy['name']) ?></td>
                <td><?= htmlspecialchars($pharmacy['address']) ?></td>
                <td><?= htmlspecialchars($pharmacy['phone']) ?></td>
                <td>
                    <a href="https://www.google.com/maps?q=<?= $pharmacy['latitude'] ?>,<?= $pharmacy['longitude'] ?>" target="_blank" class="btn-map">
                        View on Map
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No pharmacies found in the database.</p>
    <?php endif; ?>
</div>

</body>
</html>
