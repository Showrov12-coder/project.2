<?php
session_start();
include("db.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : null; // For edit functionality
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $medicalHistory = $_POST['medical_history'];

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone)) {
        if ($id) {
            // Update existing patient record
            $stmt = $conn->prepare("UPDATE patients SET name = ?, age = ?, gender = ?, email = ?, phone = ?, address = ?, medical_history = ? WHERE id = ?");
            $stmt->bind_param("sisssssi", $name, $age, $gender, $email, $phone, $address, $medicalHistory, $id);
            $message = $stmt->execute() ? "Patient information updated successfully!" : "Error updating patient information.";
        } else {
            // Insert new patient record
            $stmt = $conn->prepare("INSERT INTO patients (name, age, gender, email, phone, address, medical_history) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sisssss", $name, $age, $gender, $email, $phone, $address, $medicalHistory);
            $message = $stmt->execute() ? "Patient information added successfully!" : "Error adding patient information.";
        }

        echo "<script type='text/javascript'>alert('$message');</script>";
        $stmt->close();
    } else {
        echo "<script type='text/javascript'>alert('Invalid email or phone number.');</script>";
    }
}

// Fetch patient for editing
$editPatient = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $result = $conn->query("SELECT * FROM patients WHERE id = $editId");
    $editPatient = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <style>
        /* CSS here */
    /* Global Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
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
        background-color:rgb(0, 140, 12);
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
        <h1>Patient Information</h1>

        <form action="" method="post">
            <?php if ($editPatient): ?>
                <input type="hidden" name="id" value="<?= $editPatient['id'] ?>">
            <?php endif; ?>

            <div>
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter patient's name" value="<?= $editPatient['name'] ?? '' ?>" required>
            </div>

            <div>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter patient's age" value="<?= $editPatient['age'] ?? '' ?>" required>
            </div>

            <div>
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" <?= isset($editPatient['gender']) && $editPatient['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= isset($editPatient['gender']) && $editPatient['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= isset($editPatient['gender']) && $editPatient['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" value="<?= $editPatient['email'] ?? '' ?>" required>
            </div>

            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter phone number" value="<?= $editPatient['phone'] ?? '' ?>" required>
            </div>

            <div>
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter address"><?= $editPatient['address'] ?? '' ?></textarea>
            </div>

            <div>
                <label for="medical_history">Medical History:</label>
                <textarea id="medical_history" name="medical_history" rows="3" placeholder="Enter medical history"><?= $editPatient['medical_history'] ?? '' ?></textarea>
            </div>

            <button type="submit"><?= $editPatient ? 'Update Patient' : 'Add Patient' ?></button>
            <button type="button" onclick="window.location.href='AdminInterpage.php';">Back</button>
        </form>

        <h2>List of Patients</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No:</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Medical History</th>
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
                                <td>{$row['address']}</td>
                                <td>{$row['medical_history']}</td>
                                <td>
                                    <a href='?edit={$row['id']}'>Edit</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No patients found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>