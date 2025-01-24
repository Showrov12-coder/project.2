<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Camp</title>
    <link rel="stylesheet" href="camp_style.css">
</head>
<body>

    <div class="container">
        <h2>Add New Camp</h2>
        <form action="add_camp_database.php" method="POST">
            <label>Camp Name:</label>
            <input type="text" name="camp_name" required>

            <label>Camp Number:</label>
            <input type="text" name="camp_number" required>

            <label>Doctor Name:</label>
            <input type="text" name="doctor_name" required>

            <label>Doctor Number:</label>
            <input type="text" name="doctor_number" required>

            <label>Number of Patients:</label>
            <input type="number" name="num_patients" required>

            <label>Number of Helpers:</label>
            <input type="number" name="num_helpers" required>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

</body>
</html>
