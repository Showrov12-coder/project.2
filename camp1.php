<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Camp Management</title>
    <link rel="stylesheet" href="camp_style.css">
</head>
<body>

    <header>
        <h1>Medical Camp Management</h1>
    </header>

    <div class="container">
        <h2>Camp Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Camp Name</th>
                    <th>Camp Number</th>
                    <th>Doctor Name</th>
                    <th>Doctor Number</th>
                    <th>Patients</th>
                    <th>Helpers</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_data_camp.php'; ?>
            </tbody>
        </table>
        <br>
        <a href="add_camp.php" class="btn">Add New Camp</a>
    </div>

</body>
</html>
