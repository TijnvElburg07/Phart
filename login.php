<?php
session_start();
require_once 'config.php';



// Controleert of het formulier is ingediend via de POST-methode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    try {
        // Haalt de gebruiker op uit de database
        $stmt = $pdo->prepare("SELECT id, name, password, role FROM users WHERE name = ? LIMIT 1");
        $stmt->execute([$fullname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Start sessie en slaat gebruikersgegevens op
            $_SESSION['userId'] = $user['id'];
            $_SESSION['fullname'] = $user['name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $user['role'];

            header("Location: index.php"); // Doorsturen/redirecten naar dashboard
            exit();
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        $error = "Fout bij inloggen: " . $e->getMessage();
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <div class="form-group">
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
        </div>

        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

        <div class="submit-button">
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>
