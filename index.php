<?php
include 'config.php'; 
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  header("Location: login.php");
  exit();
}

$name = $_SESSION['fullname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phart - Your Digital Health Companion</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container header-container">
      <div class="logo">
        <div class="logo-icon">
          <i class='fab fa-medrt' id="icon"></i>
        </div>
        <span class="logo-text">Phart</span>
      </div>

      <nav>
        <a href="index.php" class="active">Home</a>
        <a href="search.php">Advanced Search</a>
        <a href="prescription.php">Prescriptions</a>
      </nav>

      <button class="btn btn-primary" id="register-btn">
        Sign Up
        <i class='fas fa-id-badge'></i>
      </button>
    </div>
  </header>

  <main>
    <!-- Hero Section -->
    <section class="hero">
      <div class="container">
        <h1>Phart</h1>
        <h4>Welcome, <?php echo $name ?></h4>
        <p>Your trusted digital companion for managing prescriptions, health, and wellness.</p>
      </div>
    </section>

    <!-- Easy Refills Section -->
    <section class="feature">
      <div class="container feature-container">
        <div class="feature-content">
          <h2>Easy Refills</h2>
          <p>Refill prescriptions seamlessly with just a few taps on your phone.</p>
          <div class="feature-buttons">
            <button class="btn btn-primary">Try now</button>
            <button class="btn btn-text">Learn more</button>
          </div>
        </div>
        <div class="feature-image">
          <img src="Images/Doctor.png" alt="Doctor with tablet">
        </div>
      </div>
    </section>

    <!-- Health Insights Section -->
    <section class="feature">
      <div class="container feature-container reverse">
        <div class="feature-image">
          <img src="Image/mobile_app" alt="Mobile app">
        </div>
        <div class="feature-content">
          <h2>Health Insights</h2>
          <p>Track your health and receive tailored insights based on your medication history.</p>
          <div class="feature-buttons">
            <button class="btn btn-primary">Try now</button>
            <button class="btn btn-text">Learn more</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial">
      <div class="container testimonial-container">
        <div class="testimonial-image">
          <img src="Images/review_woman" alt="Customer testimonial">
        </div>
        <div class="testimonial-content">
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="testimonial-text">
            Phart has made my life so much easier! Their fast delivery and excellent customer service are unmatched.
          </p>
          <div class="testimonial-author">
            <h4>Emily Johnson</h4>
            <p>Health Blogger</p>
          </div>
          <div class="testimonial-nav">
            <div class="dots">
              <div class="dot active"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
            <div class="nav-buttons">
              <button class="nav-btn">
                <i class="fa fa-angle-left"></i>
              </button>
              <button class="nav-btn">
                <i class="fa fa-angle-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
      <div class="container">
        <h2>Join Phart Today!</h2>
        <p>Sign up now to manage prescriptions, track medications, and enjoy exclusive benefits!</p>
        <a href="#" class="btn-cta">Get started</a>
      </div>
      <button class="btn btn-primary" id="toggleLlmPopup" style="position: fixed; bottom: 20px; right: 340px; z-index: 1001;">
        💬 Chat
      </button>

    </section>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-top">
        <div class="footer-logo">
          <div class="logo-icon">
            <i class='fab fa-medrt' id="icon"></i>
          </div>
          <span class="logo-text">Smart Pharmacy</span>
        </div>

        <div class="newsletter">
          <p>Subscribe to our newsletter</p>
          <div class="newsletter-form">
            <input type="email" placeholder="Input your email" class="newsletter-input">
            <button class="newsletter-btn">Subscribe</button>
          </div>
        </div>
      </div>

      <div class="footer-links">
        <div>
          <h4>Product</h4>
          <ul>
            <li><a href="#">Features</a></li>
            <li><a href="#">Pricing</a></li>
          </ul>
        </div>
        <div>
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">User guides</a></li>
            <li><a href="#">Webinars</a></li>
          </ul>
        </div>
        <div>
          <h4>Company</h4>
          <ul>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
        <div>
          <h4>Plans & Pricing</h4>
          <ul>
            <li><a href="#">Personal</a></li>
            <li><a href="#">Start up</a></li>
            <li><a href="#">Organization</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="footer-left">
          <select class="language-select">
            <option>English</option>
            <option>Spanish</option>
            <option>French</option>
          </select>
          <p class="copyright">© 2023 Brand, Inc.</p>
        </div>
        <div class="footer-center">
          <a href="#">Privacy</a>
          <a href="#">Terms</a>
          <a href="#">Sitemap</a>
        </div>
        <div class="social-links">
          <a href="#" class="social-link">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-digg"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <!-- LLM Chat Popup -->
  <div class="llm-popup" id="llmPopup">
    <form method="post" action="llm_response.php">
      <textarea name="prompt" rows="4" placeholder="Stel je vraag..." required></textarea>
      <input type="submit" value="Verstuur">
    </form>
  </div>
  <script src="js/script.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggleLlmPopup');
    const popup = document.getElementById('llmPopup');

    toggleBtn.addEventListener('click', () => {
      popup.style.display = (popup.style.display === 'none' || popup.style.display === '') ? 'block' : 'none';
    });

    // Start hidden
    popup.style.display = 'none';
  </script>
</body>

</html>