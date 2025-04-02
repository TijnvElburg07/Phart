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
                    <path d="M5 25L15 5L20 15L25 5L15 25H5Z" fill="#00D1FF" stroke="#00D1FF" stroke-width="2"/>
                </svg>
            </div>
            <h1>Apothecare</h1>
        </div>
        <nav>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Advanced Search</a></li>
                <li><a href="#">Prescriptions</a></li>
            </ul>
        </nav>
        <div class="login-button">
            <button>Log In</button>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>CREATE ACCOUNT</h2>
            
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name">
                </div>
                
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <p class="password-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</p>
                </div>
                
                <div class="form-group">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                </div>
                
                <div class="recaptcha">
                    <div class="g-recaptcha">
                        <!-- Placeholder for reCAPTCHA -->
                        <div class="recaptcha-placeholder">
                            <input type="checkbox"> I'm not a robot
                            <div class="recaptcha-logo">reCAPTCHA</div>
                        </div>
                    </div>
                </div>
                
                <div class="terms">
                    <label>
                        <input type="checkbox" name="terms" id="terms">
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