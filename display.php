<?php

$conn = mysqli_connect("127.0.0.1:3307", "root", "akashiyahya_99", "project");


$sql = "SELECT id, name, email FROM stud";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Contacts - Display</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Contacts</h1>
        
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <br>

       <button><a href="correct.php">Go Back</a></button> 
    </div>
</body>
</html>

<?php

mysqli_close($conn);
?>
