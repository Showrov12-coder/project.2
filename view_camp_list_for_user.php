<?php
include 'db.php';

$query = "SELECT * FROM camps";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camp Names List</title>
    <link rel="stylesheet" href="view_camp_list_for_user.css">
</head>
<body>

    <header>
        <h1>Camp Names List</h1>
    </header>

    <div class="container">
        <h2>List of Camps</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Camp Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serial_no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$serial_no}</td>";
                    echo "<td>{$row['camp_name']}</td>";
                    echo "</tr>";
                    $serial_no++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
