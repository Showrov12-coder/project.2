<?php
session_start();
include("db.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_VALIDATE_INT) : null; // For edit functionality
    $name = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $latitude = htmlspecialchars(trim($_POST['latitude']));
    $longitude = htmlspecialchars(trim($_POST['longitude']));

    if (!empty($name) && !empty($address) && !empty($phone)) {
        if ($id) {
            // Update existing pharmacy record
            $stmt = $conn->prepare("UPDATE pharmacies SET name = ?, address = ?, phone = ?, latitude = ?, longitude = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $name, $address, $phone, $latitude, $longitude, $id);
            $message = $stmt->execute() ? "Pharmacy information updated successfully!" : "Error updating pharmacy information.";
        } else {
            // Insert new pharmacy record
            $stmt = $conn->prepare("INSERT INTO pharmacies (name, address, phone, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $address, $phone, $latitude, $longitude);
            $message = $stmt->execute() ? "Pharmacy information added successfully!" : "Error adding pharmacy information.";
        }
        $stmt->close();
        echo "<script>alert('$message'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Please fill all required fields.');</script>";
    }
}

// Fetch pharmacy for editing
$editPharmacy = null;
if (isset($_GET['edit']) && filter_var($_GET['edit'], FILTER_VALIDATE_INT)) {
    $editId = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM pharmacies WHERE id = ?");
    $stmt->bind_param("i", $editId);
    $stmt->execute();
    $result = $stmt->get_result();
    $editPharmacy = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Information</title>
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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Pharmacy Information</h1>
        <form action="" method="post">
            <?php if ($editPharmacy): ?>
                <input type="hidden" name="id" value="<?= $editPharmacy['id'] ?>">
            <?php endif; ?>

            <label for="name">Pharmacy Name:</label>
            <input type="text" id="name" name="name" value="<?= $editPharmacy['name'] ?? '' ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?= $editPharmacy['address'] ?? '' ?></textarea>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?= $editPharmacy['phone'] ?? '' ?>" required>

            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="<?= $editPharmacy['latitude'] ?? '' ?>">

            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="<?= $editPharmacy['longitude'] ?? '' ?>">

            <button type="submit"><?= $editPharmacy ? 'Update Pharmacy' : 'Add Pharmacy' ?></button>
            <button type="button" onclick="window.location.href='AdminInterpage.php';">Back</button>
        </form>

        <h2>List of Pharmacies</h2>
        <h3>Sample list .....</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Seiral No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM pharmacies ORDER BY id ASC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['latitude']}</td>
                                <td>{$row['longitude']}</td>
                                <td><a href='?edit={$row['id']}'>Edit</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No pharmacies found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
