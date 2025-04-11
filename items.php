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
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: white;
        }

        .item-card {
            border: 1px solid #333;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            position: relative;
            background-color: #1a1a1a;
        }

        .item-image {
            width: 150px;
            height: 150px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 10px;
        }

        .item-image img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .item-details {
            flex: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .item-details h2 {
            font-size: 2.2rem;
            margin: 0;
            color: white;
            font-weight: normal;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
            font-size: 1.2rem;
            margin: 5px 0;
        }

        .btn-wrapper {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        #item-btn {
            padding: 10px 20px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }

        #item-btn {
            background-color: #00d4ff;
            color: #000000;
        }

        #item-btn:hover {
        border: 1px solid #00d4ff;
        color: #00d4ff;
        background-color: #000000;
        }

        .header {
        background-color: #1a1a1a;
        color: white;
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
                            <img src="<?= htmlspecialchars("Images/thumbnails/" . $item['thumbnail']) ?>" alt="Item afbeelding">
                        <?php else: ?>
                            <!-- Als er geen thumbnail is, toon een placeholder -->
                            <img src="https://via.placeholder.com/150?text=Geen+Afbeelding" alt="Geen afbeelding">
                        <?php endif; ?>
                    </div>
                    <div class="item-details">
                        <h2><?= htmlspecialchars($item['name']) ?></h2>
                        <p class="price">€<?= number_format($item['price'], 2, ',', '.') ?></p>
                        <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>
                    </div>
                    <div class="btn-wrapper">
                        <button id="item-btn">
                            Koop nu
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>