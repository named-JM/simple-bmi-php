<?php
include "db_connection.php";

// Fetching data from the database
$sql = "SELECT id, name, height, weight, bmi, date FROM bmi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Height</th>
            <th>Weight</th>
            <th>BMI</th>
            <th>Date</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row["id"]) . "</td>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['height']) . "</td>
            <td>" . htmlspecialchars($row['weight']) . "</td>
            <td>" . htmlspecialchars($row['bmi']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
