<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camp_name = $_POST['camp_name'];
    $camp_number = $_POST['camp_number'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_number = $_POST['doctor_number'];
    $num_patients = $_POST['num_patients'];
    $num_helpers = $_POST['num_helpers'];

    $query = "INSERT INTO camps (camp_name, camp_number, doctor_name, doctor_number, num_patients, num_helpers) 
              VALUES ('$camp_name', '$camp_number', '$doctor_name', '$doctor_number', '$num_patients', '$num_helpers')";

    if (mysqli_query($conn, $query)) {
        header("Location: camp1.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
