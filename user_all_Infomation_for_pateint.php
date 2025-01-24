<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #0056b3;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table thead {
            background-color: #f8f9fa;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            font-weight: bold;
            color: #333;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .btn-view, .btn-back {
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
        }
        .btn-view {
            background-color: #28a745;
        }
        .btn-view:hover {
            background-color: #218838;
        }
        .btn-back {
            background-color: #0056b3;
            margin-top: 20px;
        }
        .btn-back:hover {
            background-color: #003f8c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Patient Information</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM patients ORDER BY id ASC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td><a href='patient_details_print.php?id={$row['id']}' class='btn-view'>View</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No patient records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn-back">Back to Home</a>
        <a href="userinterpage.php" class="btn-back">&lt; Prev</a>
    </div>
</body>
</html>
