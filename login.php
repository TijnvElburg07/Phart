<?php
session_start();
include 'config.php';

// Controleert of het formulier is ingediend via de POST-methode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    try {
        // Haalt de gebruiker op uit de database
        $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE name = ? LIMIT 1");
        $stmt->execute([$fullname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Start sessie en slaat gebruikersgegevens op
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['name'];
            $_SESSION['loggedin'] = true;
            
            header("Location: index.php"); // Doorsturen naar dashboard
            exit();
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        $error = "Fout bij inloggen: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare - Log In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #004952;
            color: white;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a1a1a;
            padding: 15px 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }

        .logo-icon {
            color: #00D1FF;
            margin-right: 10px;
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: #999;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a.active {
            color: #00D1FF;
            border-bottom: 2px solid #00D1FF;
            padding-bottom: 5px;
        }

        .nav-links a:hover {
            color: white;
        }

        .signup-btn {
            background-color: #00D1FF;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .login-container {
            max-width: 1000px;
            margin: 60px auto;
            background-color: #1a1a1a;
            border-radius: 5px;
            padding: 40px;
        }

        .login-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .login-title {
            font-size: 48px;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            background-color: #2a2a2a;
            border: 1px solid #333;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        .error-message {
            color: #FF5252;
            margin-top: 8px;
            font-size: 14px;
        }

        .login-options {
            text-align: center;
            margin: 20px 0;
            color: #ccc;
        }

        .register-link {
            color: #00D1FF;
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            background-color: #00D1FF;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span class="logo-icon">⚡</span>
            Apothecare
        </div>
        <div class="nav-links">
            <a href="#" class="active">Home</a>
            <a href="#">Advanced Search</a>
            <a href="#">Prescriptions</a>
        </div>
        <button class="signup-btn">
            <span>👤</span>
            SignUp
        </button>
    </nav>

    <div class="login-container">
        <div class="login-form">
            <h1 class="login-title">Log In</h1>
            
            <form action="login.php" method="post">
                <div class="form-group">
                    <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Full Name">
                    <?php if (isset($_POST['fullname']) && empty($_POST['fullname'])): ?>
                        <div class="error-message">Full name is required</div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-input" placeholder="Password">
                    <?php if (isset($_POST['password']) && empty($_POST['password'])): ?>
                        <div class="error-message">Password is required</div>
                    <?php endif; ?>
                </div>
                
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <div class="login-options">
                    Need an account? <a href="register.php" class="register-link">Register</a>
                </div>
                
                <button type="submit" class="login-btn">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>
