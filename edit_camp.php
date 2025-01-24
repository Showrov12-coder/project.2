<?php
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM camps WHERE id=$id";
$result = mysqli_query($conn, $query);
$camp = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camp_name = $_POST['camp_name'];
    $camp_number = $_POST['camp_number'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_number = $_POST['doctor_number'];
    $num_patients = $_POST['num_patients'];
    $num_helpers = $_POST['num_helpers'];

    $update_query = "UPDATE camps SET camp_name='$camp_name', camp_number='$camp_number', 
                    doctor_name='$doctor_name', doctor_number='$doctor_number', 
                    num_patients='$num_patients', num_helpers='$num_helpers' WHERE id=$id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: camp1.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Camp</title>
    <link rel="stylesheet" href="edit_camp.css"> <!-- Add your CSS file here -->
</head>
<body>
    <div class="container">
        <h2>Edit Camp Details</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="camp_name">Camp Name:</label></td>
                    <td><input type="text" name="camp_name" id="camp_name" value="<?= $camp['camp_name'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="camp_number">Camp Number:</label></td>
                    <td><input type="text" name="camp_number" id="camp_number" value="<?= $camp['camp_number'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="doctor_name">Doctor Name:</label></td>
                    <td><input type="text" name="doctor_name" id="doctor_name" value="<?= $camp['doctor_name'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="doctor_number">Doctor Number:</label></td>
                    <td><input type="text" name="doctor_number" id="doctor_number" value="<?= $camp['doctor_number'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="num_patients">Number of Patients:</label></td>
                    <td><input type="number" name="num_patients" id="num_patients" value="<?= $camp['num_patients'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="num_helpers">Number of Helpers:</label></td>
                    <td><input type="number" name="num_helpers" id="num_helpers" value="<?= $camp['num_helpers'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <button type="submit" class="btn">Update</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
