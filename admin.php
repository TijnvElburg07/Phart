<?php
require_once 'config.php';
session_start();

$role = $_SESSION['role'];

echo "Role: " . $role;

if ($role !== 'admin') {
    header("Location: index.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikersbeheer</title>
    <style>
        .user-container {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: fit-content;
        }

        .user-container button {
            margin-left: 10px;
        }
    </style>
</head>

<body>

    <h1>Gebruikerslijst</h1>

    <?php foreach ($users as $user): ?>
        <div class="user-container">
            <strong>Naam:</strong> <?= htmlspecialchars($user['name']) ?> |
            <strong>Rol:</strong> <?= htmlspecialchars($user['role']) ?>
            <a href="prescribe.php?user_id=<?= urlencode($user['id']) ?>">
                <button>Bewerk / Schrijf voor</button>
            </a>
        </div>
    <?php endforeach; ?>

</body>

</html>