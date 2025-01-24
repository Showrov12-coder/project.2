<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_doctor'])) {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone)) {
        $stmt = $conn->prepare("INSERT INTO doctors (name, specialization, email, phone, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $specialization, $email, $phone, $address);

        if ($stmt->execute()) {
            echo "<script>alert('Doctor information added successfully!');</script>";
        } else {
            echo "<script>alert('Error adding doctor information.');</script>";
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
    <title>Doctor Information</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        margin: auto;
        padding: auto;
        background-color:rgb(183, 233, 241);
        color: #333;
    }

    .container {
        max-width: 800px auto;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color:rgb(179, 51, 0);
        
    }
    h2{

        text-align: left;
        color: black;
        text-decoration: underline;
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
        background-color:rgb(1, 16, 29);
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
        <h1>Doctor Information</h1>
        <h2>Sample List ....</h2>

        <form action="" method="post">
            <div>
                <label for="name">Doctor Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter doctor's name" required>
            </div>

            <div>
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" placeholder="e.g., Cardiologist" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
            </div>

            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>

            <div>
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter address"></textarea>
            </div>

            <button type="submit" name="add_doctor">Add Doctor</button>
            <button type="button" onclick="window.location.href='AdminInterpage.php';">Back</button>
        </form>

        <h2>List of Doctors</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM doctors ORDER BY id ASC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['specialization']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>
                                    <a href='edit_doctor.php?id={$row['id']}' class='btn-edit'>Edit</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No doctors found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
