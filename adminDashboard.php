<?php
session_start();
if (!isset($_SESSION['admin_access']) || $_SESSION['admin_access'] !== true) {
    header("Location: admin_key_entry.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color:rgb(175, 76, 167);
            color: white;
            padding: 5px 10px;
            text-align: center;
        }
        .container {
            margin: 20px auto;
            max-width: 900px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .card {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px 0;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card h2 {
            margin: 0;
            color: #333;
        }
        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .card a:hover {
            background-color: #45a049;
        }
        .logout {
            margin-top: 20px;
            text-align: center;
        }
        .logout a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="container">
        <h1>Welcome, Admin</h1>
        <div class="card">
            <h2>Manage Doctors</h2>
            <p>View, Add, Edit, or Delete doctor information</p>
            <a href="DoctorInfo.php">Go to Doctor Management</a>
        </div>
        <div class="card">
            <h2>Manage Patients</h2>
            <p>View, Add, Edit, or Delete patient information</p>
            <a href="patientInfo.php">Go to Patient Management</a>
        </div>
        <div class="card">
            <h2>Manage Pharmacy</h2>
            <p>View, Add, Edit, or Delete Pharmacy information</p>
            <a href="add_pharmacy.php">Go to Pharmacy Management</a>
        </div>
        <div class="card">
            <h2>Manage Campping</h2>
            <p>View, Add, Edit, or Delete Campping information</p>
            <a href="add_camp.php">Go to Camp Management</a>
        </div>
        <div class="logout">
            <p><a href="login.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
