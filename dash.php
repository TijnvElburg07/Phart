<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>phart</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <!-- Header -->
  <header class="header">
        <div style="display: flex; align-items: center;">
            <div class="logo">
                <i class='fab fa-medrt' id="icon"></i>
            </div>
            <span>Phart</span>
        </div>
        <nav class="nav">
            <a href="index.php" class="nav-item">Home</a>
            <a href="search.php" class="nav-item active">Advanced Search</a>
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

  <!-- Main Content -->
  <main>
    <!-- User Profile and Wallet -->
    <section class="user-wallet">
      <div class="user-profile">
        <div class="profile-image">
          <img src="https://via.placeholder.com/128" alt="User profile">
        </div>
        <div class="profile-info">
          <h2 class="profile-name">Hi, John Doe</h2>
          <p class="member-status">Platinum member</p>
          <p class="subscription-info">Your subscription will be renewed on February 27, 2023</p>
        </div>
      </div>
      <div class="wallet">
        <p class="wallet-label">Wallet Balance</p>
        <p class="wallet-balance">$250.00</p>
        <a href="#" class="wallet-action">Add funds to your wallet</a>
      </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
      <h2 class="search-title">Find your medicines or health products</h2>
      <div class="search-container">
        <div class="search-icon">
        <i class="fa fa-search"></i>
        </div>
        <input type="text" class="search-input" placeholder="Search for medicines, healthcare...">
      </div>
      
      <!-- Category Images -->
      <div class="categories">
        <div class="category">
          <img src="https://via.placeholder.com/120x80" alt="Category 1">
        </div>
        <div class="category">
          <img src="https://via.placeholder.com/120x80" alt="Category 2">
        </div>
        <div class="category">
          <img src="https://via.placeholder.com/120x80" alt="Category 3">
        </div>
        <div class="category">
          <img src="https://via.placeholder.com/120x80" alt="Category 4">
        </div>
      </div>
    </section>

    <!-- Order History -->
    <section class="order-history">
      <div class="order-history-header">
        <h2 class="order-history-title">Order History</h2>
        <a href="#" class="view-all">View all</a>
      </div>
      <div class="order-table-container">
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Medicine Name</th>
              <th>Rating</th>
              <th>Image</th>
              <th>User</th>
              <th>Order Date | Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>001</td>
              <td>Pain Relief Tablets</td>
              <td>
                <div class="rating">★★★★★</div>
              </td>
              <td>
                <div class="medicine-image">
                  <img src="https://via.placeholder.com/40" alt="Medicine">
                </div>
              </td>
              <td>
                <div class="user-image">
                  <img src="https://via.placeholder.com/32" alt="User">
                </div>
              </td>
              <td>
                <div>
                  <p>2023-10-01</p>
                  <p class="order-status">Shipped</p>
                </div>
              </td>
              <td>
                <button class="reorder-button">Reorder</button>
              </td>
            </tr>
            <tr>
              <td>002</td>
              <td>Cold & Flu Medicine</td>
              <td>
                <div class="rating">★★★★★</div>
              </td>
              <td>
                <div class="medicine-image">
                  <img src="https://via.placeholder.com/40" alt="Medicine">
                </div>
              </td>
              <td>
                <div class="user-image">
                  <img src="https://via.placeholder.com/32" alt="User">
                </div>
              </td>
              <td>
                <div>
                  <p>2023-10-03</p>
                  <p class="order-status">Delivered</p>
                </div>
              </td>
              <td>
                <button class="reorder-button">Reorder</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>