<?php
require_once 'config.php';
session_start();

// Controleer of de gebruiker is ingelogd en admin is
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Controleer of user_id aanwezig is in de URL
if (!isset($_GET['user_id'])) {
    echo "Geen gebruiker geselecteerd.";
    exit();
}

$user_id = $_GET['user_id'];

// Haal de naam van de gebruiker op die het voorschrift krijgt
try {
    $stmt = $pdo->prepare("SELECT name FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Gebruiker niet gevonden.";
        exit();
    }

    $username = $user['name'];

} catch (Exception $e) {
    echo "Databasefout: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de invoer uit het formulier
    $data = $_POST['voorschrift'];
    echo "Voorschrift: " . htmlspecialchars($data) . "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voorschrijven voor <?= htmlspecialchars($username) ?></title>
</head>
<body>

    <h1>Voorschrijven voor <?= htmlspecialchars($username) ?></h1>

    <form action="prescribe.php?user_id=<?= $user_id ?>" method="post">
        <label for="voorschrift">Voorschrift:</label><br>
        <textarea name="voorschrift" id="voorschrift" rows="6" cols="50" required></textarea><br><br>
        <button type="submit">Opslaan</button>
    </form>

    <br>
    <a href="admin.php">← Terug naar gebruikersbeheer</a>

</body>
</html>
