<?php
$conn = mysqli_connect("localhost", "root", "", "project");

$name = "";
$email = "";
$id_ed = null;


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_ed = mysqli_real_escape_string($conn, $_GET['id']);
    $sql5 = "SELECT name, email FROM stud WHERE id = $id_ed";
    $result = mysqli_query($conn, $sql5);

    if ($result ) {
        $row = mysqli_fetch_assoc($result);
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
    } else {
        echo "<center><h1>Contact not found with ID: " . htmlspecialchars($_GET['id']) . "</h1></center>";
        exit();
    }
}


if (isset($_POST['update']) && isset($_POST['edit_id'])) {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $updated_name = mysqli_real_escape_string($conn, $_POST['name']);
        $updated_email = mysqli_real_escape_string($conn, $_POST['email']);
        $edit_id = mysqli_real_escape_string($conn, $_POST['edit_id']);

        $sql_up = "UPDATE stud SET name='$updated_name', email='$updated_email' WHERE id=$edit_id";
        if (mysqli_query($conn, $sql_up)) {
            header("Location: display.php"); 
            exit();
        } else {
            echo "<center><h1>Error updating record: " . mysqli_error($conn) . "</h1></center>";
        }
    }
}

mysqli_close($conn);
?>






<!DOCTYPE html>
                                                          <!-- ModifiCATION OF user --->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <button id="toggle-theme" style="position: absolute; top: 20px; right: 20px;">
        🌙 Dark/ ☀️ white Mode
    </button>
    <div class="container">
        <h1>Modifier Contact</h1>
        <?php if ($id_ed !== null): ?>
            <form id="form-container" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $id_ed; ?>">
                <input type="text" name="name" id="nom" placeholder="Nom ex: othmane" value="<?php echo $name; ?>">
                <input type="email" name="email" id="email" placeholder="Email ex: name@gmail.com" value="<?php echo $email; ?>">
                <button type="submit" name="update">Save Changes</button>
            </form>
        <?php else: ?>
            <p><a href="modify.php">Go back to enter an ID to modify.</a></p>
        <?php endif; ?>

        <br>

        <a href="display.php">Afficher Contacts</a>


    </div>
    <script src="script.js"></script>

</body>
</html>