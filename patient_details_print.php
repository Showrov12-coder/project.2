<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM patients WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($result);
} else {
    echo "Invalid patient ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        h1 {
            text-align: center;
            color: #0056b3;
        }
        .details p {
            margin: 10px 0;
            font-size: 18px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .btn-print, .btn-back {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
        }
        .btn-print {
            background-color: #28a745;
        }
        .btn-print:hover {
            background-color: #218838;
        }
        .btn-back {
            background-color: #0056b3;
        }
        .btn-back:hover {
            background-color: #003f8c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Patient Details</h1>
        <div class="details">
            <p><span class="label">Name:</span> <?= $patient['name'] ?></p>
            <p><span class="label">Age:</span> <?= $patient['age'] ?></p>
            <p><span class="label">Gender:</span> <?= $patient['gender'] ?></p>
            <p><span class="label">Email:</span> <?= $patient['email'] ?></p>
            <p><span class="label">Phone:</span> <?= $patient['phone'] ?></p>
            <p><span class="label">Address:</span> <?= $patient['address'] ?></p>
            <p><span class="label">Medical History:</span> <?= $patient['medical_history'] ?></p>
        </div>
        <a href="javascript:window.print()" class="btn-print">Print</a>
        <a href="user_all_Infomation_for_pateint.php" class="btn-back">Back</a>
    </div>
</body>
</html>
