<?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "akashiyahya_99", "project");


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
    <button id="toggle-theme" style="position: absolute; top: 20px; right: 20px;">
        🌙 Dark/ ☀️ white Mode
    </button>
    <div class="container">
        <h1>Modification</h1>
        <form id="form-container" method="get" action="save.php">
            <center> <input type="number" name="id" id="nom"  placeholder="enter the id of input you want to modify"  style="width:100px;"> </center>
            <center><button type="submit">Modify</button></center>
        </form>

        <br>

        <a href="display.php">Afficher Contacts</a>


    </div>
    <script src="script.js"></script>

</body>
</html>
<?php
mysqli_close($conn);
?>