<?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "akashiyahya_99", "project");

if (isset($_POST['sub'])) {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "INSERT INTO stud (name, email) VALUES ('$name', '$email')";
        mysqli_query($conn, $sql);
    } else {
        echo "<center><h1>You are not registered. Please fill in all fields.</h1></center>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Contacts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Contacts</h1>
        <form id="form-container" method="post">
            <input type="text" name="name" id="nom" placeholder="Nom ex: othmane">
            <input type="email" name="email" id="email" placeholder="Email ex: othmane@gmail.com">
            <button type="submit" name="sub" id="sbmbtn">Ajouter Contact</button>
        </form>

        <br>

        <a href="display.php">Afficher Contacts</a>
    </div>
</body>
</html>
