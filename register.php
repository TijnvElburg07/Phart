<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare - Create Account</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo">
            </div>
            <h1>Apothecare</h1>
        </div>
        
        <!-- Navigatiemenu -->
        <nav>
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="search.php">Advanced Search</a></li>
                <li><a href="prescription.php">Prescriptions</a></li>
            </ul>
        </nav>

        <!-- Login-knop -->
        <div class="login-button">
            <button>Log In</button>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>CREATE ACCOUNT</h2>

            <!-- Registratieformulier -->
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

                <!-- Akkoord met de voorwaarden -->
                <div class="terms">
                    <label>
                        <input type="checkbox" name="terms" id="terms" required>
                        <span>I agree to the Terms of Service and Privacy Policy</span>
                    </label>
                </div>

                <!-- Verzenden van het formulier -->
                <div class="submit-button">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>