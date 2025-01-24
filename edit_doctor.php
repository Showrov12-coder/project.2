<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM doctors WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $doctor = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_doctor'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone)) {
        $stmt = $conn->prepare("UPDATE doctors SET name=?, specialization=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $specialization, $email, $phone, $address, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Doctor information updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error updating doctor information.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Invalid email or phone number.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        text-align: center;
        color: #0056b3;
    }

    form {
        margin-top: 20px;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    input, textarea, button {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #0056b3;
        color: white;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #003f8c;
    }

    button:active {
        background-color: #002b66;
    }

    button[type="button"] {
        background-color: #6c757d;
        margin-top: 10px;
    }

    button[type="button"]:hover {
        background-color: #5a6268;
    }

    table {
        width: 100%;
        margin-top: 30px;
        border-collapse: collapse;
    }

    table thead {
        background-color: #f8f9fa;
    }

    table th, table td {
        padding: 10px;
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

    @media (max-width: 600px) {
        .container {
            padding: 15px;
        }

        input, textarea, button {
            font-size: 12px;
        }

        table th, table td {
            font-size: 12px;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Doctor Information</h1>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $doctor['id'] ?>">

            <div>
                <label for="name">Doctor Name:</label>
                <input type="text" id="name" name="name" value="<?= $doctor['name'] ?>" required>
            </div>

            <div>
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" value="<?= $doctor['specialization'] ?>" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $doctor['email'] ?>" required>
            </div>

            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value="<?= $doctor['phone'] ?>" required>
            </div>

            <div>
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3"><?= $doctor['address'] ?></textarea>
            </div>

            <button type="submit" name="update_doctor">Update Doctor</button>
            <button type="button" onclick="window.location.href='index.php';">Cancel</button>
        </form>
    </div>
</body>
</html>
