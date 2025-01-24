<?php
include 'db.php';

$query = "SELECT * FROM camps";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['camp_name']}</td>";
    echo "<td>{$row['camp_number']}</td>";
    echo "<td>{$row['doctor_name']}</td>";
    echo "<td>{$row['doctor_number']}</td>";
    echo "<td>{$row['num_patients']}</td>";
    echo "<td>{$row['num_helpers']}</td>";
    echo "<td>
            <a href='edit_camp.php?id={$row['id']}' class='btn'>Edit</a>
          </td>";
    echo "</tr>";
}
?>
