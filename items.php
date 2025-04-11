<?php
require_once 'config.php';
session_start();

// Alleen toegankelijk als ingelogd
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Haal alle items op
try {
    $stmt = $pdo->query("SELECT * FROM items WHERE archived = 0 ORDER BY id DESC");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Fout bij ophalen items: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Itemoverzicht</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px;
        }

        .item-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
        }

        .item-image img {
            max-width: 120px;
            height: auto;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .item-details {
            flex: 1;
        }

        .item-details h2 {
            margin: 0 0 10px;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
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
            <a href="search.php" class="nav-item">Producten</a>
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

<div class="container">
    <h1>Beschikbare Items</h1>

    <?php if (empty($items)): ?>
        <p>Er zijn nog geen items beschikbaar.</p>
    <?php else: ?>
        <?php foreach ($items as $item): ?>
            <div class="item-card">
                <div class="item-image">
                    <?php if (!empty($item['thumbnail'])): ?>
                        <!-- Als er een thumbnail is opgeslagen, toon deze dan -->
                        <img src="<?= htmlspecialchars("Images/thumbnails/" .$item['thumbnail']) ?>" alt="Item afbeelding">
                    <?php else: ?>
                        <!-- Als er geen thumbnail is, toon een placeholder -->
                        <img src="https://via.placeholder.com/120?text=Geen+Afbeelding" alt="Geen afbeelding">
                    <?php endif; ?>
                </div>
                <div class="item-details">
                    <h2><?= htmlspecialchars($item['name']) ?></h2>
                    <p class="price">€<?= number_format($item['price'], 2, ',', '.') ?></p>
                    <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
