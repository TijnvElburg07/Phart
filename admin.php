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
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 20px;
        }


        body:after {
            content: none;
        }

        /* Left column - User list */
        h1,
        .user-container {
            background-color: #black;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            width: 90%;
            /* Reduced from 100% */
            max-width: 600px;
            /* Add maximum width */
        }


        h1,
        .user-container,
        h2,
        form,
        .success,
        .error {
            float: none;
            width: 90%;
            max-width: 600px;
            box-sizing: border-box;
        }

        /* Header styling */
        h1,
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            width: 100%;
        }

        h2 {
            margin-top: 30px;
        }

        /* User container styling */
        .user-container {
            background-color: #242424;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            width: 100%;
        }

        /* Styling for the labels and values in user container */
        .user-info {
            display: flex;
            flex: 1;
        }

        .user-info-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .user-info-item strong {
            margin-right: 5px;
            /* Small space between label and value */
        }

        /* Button styling */
        .user-container button,
        input[type="submit"] {
            background-color: #00c8ff;
            color: black;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .user-container button {
            background-color: transparent;
            border: 1px solid #00c8ff;
            color: #00c8ff;
        }

        .user-container button:hover,
        input[type="submit"]:hover {
            background-color: #00a8e0;
        }

        .user-container button:hover {
            background-color: rgba(0, 200, 255, 0.1);
        }

        /* Form styling */
        form {
            width: 90%;
            /* Reduced from 100% */
            max-width: 600px;
            /* Add maximum width */
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Adjust spacing for form elements */
        form label {
            margin-right: 5px;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: 90%;
            /* Reduced from 100% */
            max-width: 600px;
            /* Add maximum width */
            padding: 10px;
            margin-bottom: 15px;
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: white;
        }


        form textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* File input styling */
        form input[type="file"] {
            margin-bottom: 15px;
        }

        /* Submit button styling */
        form input[type="submit"] {
            align-self: flex-start;
        }

        /* Message styling */
        .success {
            background-color: rgba(0, 200, 83, 0.2);
            color: #00c853;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .error {
            background-color: rgba(255, 51, 102, 0.2);
            color: #ff3366;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .success,
        .error {
            width: 90%;
            max-width: 600px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {

            h1,
            .user-container,
            h2,
            form,
            .success,
            .error {
                float: none;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div style="display: flex; align-items: center;">
            <div class="logo">
                <i class='fab fa-medrt' id="icon"></i>
            </div>
            <span>Phart</span>
        </div>
        <nav class="nav">
            <a href="index.php" class="nav-item">Home</a>
            <a href="search.php" class="nav-item">Advanced Search</a>
            <a href="prescription.php" class="nav-item ">Prescriptions</a>
        </nav>
        </div>
        <div class="header-right">
            <i class="fas fa-bell"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-search"></i>
            <img src="/placeholder.svg?height=35&width=35" alt="Profile" class="profile">
        </div>
    </header>
    <br>
    <h1>Gebruikerslijst</h1>

    <?php foreach ($users as $user): ?>
        <div class="user-container">
            <div class="user-info">
                <div class="user-info-item">
                    <strong>Naam:</strong> <?= htmlspecialchars($user['name']) ?>
                </div>
                <div class="user-info-item">
                    <strong>Rol:</strong> <?= htmlspecialchars($user['role']) ?>
                </div>
            </div>
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