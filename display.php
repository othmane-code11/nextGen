<?php

$conn = mysqli_connect("localhost", "root", "", "");


$sql = "SELECT id, name, email FROM stud";
$result = mysqli_query($conn, $sql);

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $update = "UPDATE stud SET name='$name', email='$email' WHERE id=$id";
    mysqli_query($conn, $update);
    
    // Refresh the page to show updated data
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
// Handle delete
if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $delete = "DELETE FROM stud WHERE id=$id";
    mysqli_query($conn, $delete);
    
    // Refresh the page to show updated data
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

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
    <button id="toggle-theme" style="position: absolute; top: 20px; right: 20px;">
        🌙 Dark/ ☀️ white Mode
    </button>

    <div class="container">
        <h1>Contacts</h1>
        
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
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
                            echo "<td class='actions'>";
                            
                            // Update form (hidden by default, shown when "Modifier" is clicked)
                            echo "<form method='POST' class='update-form' style='display:none;'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<input type='text' name='name' value='".htmlspecialchars($row['name'])."'>";
                            echo "<input type='email' name='email' value='".htmlspecialchars($row['email'])."'>";
                            echo "<button type='submit' name='update' class='update-btn'>Sauvegarder</button>";
                            echo "<button type='button' class='cancel-update'>Annuler</button>";
                            echo "</form>";
                            
                            // Action buttons
                            echo "<div class='action-buttons'>";
                            echo "<button class='modifier-btn' data-id='{$row['id']}'>Modifier</button>";
                            echo "<form method='POST' class='delete-form'>";
                            echo "<button type='submit' name='supprimer' value='{$row['id']}' class='supprimer-btn'>Supprimer</button>";
                            echo "</form>";
                            echo "</div>";
                            
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <br>

        <button><a href="correct.php">Go Back</a></button> 

    </div>
    <script src="script.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>