<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phart - Your Digital Health Companion</title>
  <link rel="stylesheet" href="css/style.css" >
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
        <h1>Phart
</h1>
        <p>Your trusted digital companion for managing prescriptions, health, and wellness.</p>
      </div>
    </section>

    <!-- Easy Refills Section -->
    <section class="py-12 bg-black text-white">
  <div class="container mx-auto grid gap-8 md:grid-cols-2 md:items-center">
    <div class="feature-content">
      <h2 class="text-3xl font-bold mb-4">Easy Refills</h2>
      <p class="text-gray-400 mb-6">Refill prescriptions seamlessly with just a few taps on your phone.</p>
      <div class="flex gap-4">
        <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Try now</button>
        <button class="border-2 border-gray-600 text-gray-400 px-6 py-2 rounded hover:bg-gray-600 hover:text-white">
          Learn more
        </button>
      </div>
    </div>
    <div class="flex flex-col gap-4 p-8 sm:flex-row sm:items-center sm:gap-6 sm:py-4 bg-gray-800 rounded-lg">
      <img class="mx-auto block h-24 w-24 rounded-full sm:mx-0 sm:shrink-0" src="/img/erin-lindford.jpg" alt="Erin Lindford" />
      <div class="space-y-2 text-center sm:text-left">
        <div class="space-y-0.5">
          <p class="text-lg font-semibold text-white">Erin Lindford</p>
          <p class="font-medium text-gray-400">Doctor</p>
        </div>
        <button class="border border-purple-400 text-purple-400 px-4 py-2 rounded hover:bg-purple-600 hover:text-white active:bg-purple-700">
          Message
        </button>
      </div>
    </div>
  </div>
</section>



    <!-- Health Insights Section -->
    <section class="feature">
      <div class="container feature-container reverse">
        <div class="feature-image">
          <img src="https://via.placeholder.com/600x400" alt="Mobile app">
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
          <img src="https://via.placeholder.com/300x300" alt="Customer testimonial">
        </div>
        <div class="testimonial-content">
          <p class="testimonial-text">
            Phart has made my life so much easier! Their fast delivery and excellent customer service are unmatched.
          </p>
          <div class="testimonial-author">
            <h4>Emily Johnson</h4>
            <p>Health Blogger</p>
          </div>
          <div class="testimonial-nav">         
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
        <button class="btn btn-cta" >Get started</button>
      </div>
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
  <script src="js/script.js"></script>
</body>
</html>