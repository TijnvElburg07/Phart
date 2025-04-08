<?php
require_once 'config.php';
session_start();


if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){
    $role = $_SESSION['role'];

    if($role !== 'admin'){
        header("Location: index.php");
        exit();
    }
}

try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        echo "Name:" .$user['name'] . " | Role: " . $user['role'] . "<br>";
    }
} catch (Exception $e) {
    echo "Database error: " .$e->getMessage();
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>