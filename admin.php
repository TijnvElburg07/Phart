<?php
require_once 'config.php';
session_start();

// Check of gebruiker admin is
$role = $_SESSION['role'] ?? null;
if ($role !== 'admin') {
    header("Location: index.php");
    exit();
}

// Haal gebruikers op
try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage();
    die();
}

// Item toevoegen als POST is ontvangen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';

    // Controleer of itemnaam al bestaat in de database
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM items WHERE name = ?");
        $stmt->execute([$name]);
        $existingName = $stmt->fetchColumn();
        if ($existingName > 0) {
            $errorMsg = "Er bestaat al een item met deze naam.";
        }
    } catch (Exception $e) {
        $errorMsg = "Fout bij het controleren van de itemnaam: " . $e->getMessage();
    }

    // Thumbnail verwerken als bestand
    $thumbnail = null;
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        // Zorg voor een veilige bestandsnaam
        $fileTmpName = $_FILES['thumbnail']['tmp_name'];
        $fileName = basename($_FILES['thumbnail']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Controleer op geldige bestandsextensie
        if (in_array($fileExtension, $allowedExtensions)) {
            // Maak een veilige bestandsnaam
            $newFileName = uniqid('thumbnail_', true) . '.' . $fileExtension;
            $uploadDir = 'Images/thumbnails/';
            $uploadPath = $uploadDir . $newFileName;

            // Controleer of de afbeelding al bestaat in de database
            try {
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM items WHERE thumbnail = ?");
                $stmt->execute([$newFileName]);
                $existingImage = $stmt->fetchColumn();
                if ($existingImage > 0) {
                    $errorMsg = "Er bestaat al een item met deze afbeelding.";
                }
            } catch (Exception $e) {
                $errorMsg = "Fout bij het controleren van de afbeelding: " . $e->getMessage();
            }

            // Verplaats het bestand naar de juiste map
            if (!isset($errorMsg) && move_uploaded_file($fileTmpName, $uploadPath)) {
                // Sla alleen de bestandsnaam op in de database (geen pad)
                $thumbnail_name = $newFileName; 
            } else {
                $errorMsg = "Er is een fout opgetreden bij het uploaden van de afbeelding.";
            }
        } else {
            $errorMsg = "Ongeldige bestandsextensie. Alleen JPG, JPEG, PNG en GIF bestanden zijn toegestaan.";
        }
    }

    // Validatie van de invoer
    if (!empty($name) && is_numeric($price) && !empty($description) && isset($thumbnail_name) && !isset($errorMsg)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO items (name, price, description, thumbnail, archived) VALUES (?, ?, ?, ?, 0)");
            $stmt->execute([$name, $price, $description, $thumbnail_name]); // Sla alleen de bestandsnaam op
            $successMsg = "Item succesvol toegevoegd!";
        } catch (Exception $e) {
            $errorMsg = "Fout bij toevoegen item: " . $e->getMessage();
        }
    } else {
        $errorMsg = "Vul alle velden correct in, inclusief het uploaden van een thumbnail.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikersbeheer & Item toevoegen</title>
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

        form {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #999;
            border-radius: 10px;
            max-width: 400px;
        }

        form input, form textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 6px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

    <h2>Voeg nieuw item toe</h2>

    <?php if (isset($successMsg)): ?>
        <p class="success"><?= htmlspecialchars($successMsg) ?></p>
    <?php elseif (isset($errorMsg)): ?>
        <p class="error"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="name">Naam:</label>
        <input type="text" name="name" required>

        <label for="price">Prijs (€):</label>
        <input type="number" name="price" step="0.01" required>

        <label for="description">Beschrijving:</label>
        <textarea name="description" required></textarea>

        <label for="thumbnail">Thumbnail afbeelding:</label>
        <input type="file" name="thumbnail" accept="image/*" required>

        <input type="submit" value="Toevoegen">
    </form>

</body>
</html>
