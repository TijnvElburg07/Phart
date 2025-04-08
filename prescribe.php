<?php
require_once 'config.php';
session_start();

// Controleer of de gebruiker is ingelogd en admin is
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['voorschrift'];
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voorschrijven voor <?= htmlspecialchars($_SESSION['fullname']) ?></title>
</head>
<body>

    <h1>Voorschrijven voor <?= htmlspecialchars($_SESSION['fullname']) ?></h1>

    <form action="prescribe.php" method="post">
        <label for="voorschrift">Voorschrift:</label><br>
        <textarea name="voorschrift" id="voorschrift" rows="6" cols="50" required></textarea><br><br>
        <button type="submit">Opslaan</button>
    </form>

    <br>
    <a href="gebruikersbeheer.php">← Terug naar gebruikersbeheer</a>

</body>
</html>
