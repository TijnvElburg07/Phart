<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $birthdate = $_POST['dob'];
    $password = $_POST['password'];
    
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO shipping_address (Address, Zipcode, City, Country) VALUES (?, ?, ?, ?)");
        $stmt->execute([$address, $zipcode, $city, $country]);
        $addressId = $pdo->lastInsertId();
        
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, password, dateOfBirth, addressId, paymentInfoId, role, archived, ownedItems) 
                       VALUES (?, ?, ?, ?, NULL, 'user', 0, NULL)");
            $stmt->execute([$fullname, $encrypted_password, $birthdate, $addressId]);
        } catch (PDOException $e) {
            echo "Fout bij registratie: " . $e->getMessage();
        }


    } catch (PDOException $e) {
        echo "Fout bij registratie: " . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare - Create Account</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 25L15 5L20 15L25 5L15 25H5Z" fill="#00D1FF" stroke="#00D1FF" stroke-width="2" />
                </svg>
            </div>
            <h1>Apothecare</h1>
        </div>
        <nav>
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="search.php">Advanced Search</a></li>
                <li><a href="prescription.php">Prescriptions</a></li>
            </ul>
        </nav>
        <div class="login-button">
            <button>Log In</button>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>CREATE ACCOUNT</h2>

            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <input type="text" id="address" name="address" placeholder="Straatnaam + huisnummer" required>
                </div>

                <div class="form-group">
                    <input type="text" id="zipcode" name="zipcode" placeholder="Postcode" required>
                </div>

                <div class="form-group">
                    <input type="text" id="city" name="city" placeholder="Stad" required>
                </div>

                <div class="form-group">
                    <input type="text" id="country" name="country" placeholder="Land" required>
                </div>

                <div class="form-group">
                    <input type="date" id="dob" name="dob" placeholder="Date of Birth" class="styled-date" required>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <p class="password-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</p>
                </div>

                <div class="form-group">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                </div>

                <div class="terms">
                    <label>
                        <input type="checkbox" name="terms" id="terms" required>
                        <span>I agree to the Terms of Service and Privacy Policy</span>
                    </label>
                </div>

                <div class="submit-button">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>