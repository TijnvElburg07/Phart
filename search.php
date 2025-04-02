<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apothecare</title>
  <link rel="stylesheet" href="CSS/search.css">
</head>
<body>
    <header class="header">
        <div style="display: flex; align-items: center;">
            <div class="logo">
                <span class="logo-icon">⚡</span>
                <span>Apothecare</span>
            </div>
            <nav class="nav">
                <a href="#" class="nav-item">Home</a>
                <a href="#" class="nav-item active">Advanced Search</a>
                <a href="#" class="nav-item">Prescriptions</a>
            </nav>
        </div>
        <div class="header-right">
            <button class="icon-btn">🔔</button>
            <button class="icon-btn">⚙️</button>
            <button class="icon-btn">🔍</button>
            <img src="/placeholder.svg?height=35&width=35" alt="Profile" class="profile">
        </div>
    </header>

    <div class="container">
        <div class="filters">
            <button class="filter-pill active">All Medicines</button>
            <button class="filter-pill">Tablet</button>
            <button class="filter-pill">Pain Relief</button>
            <button class="filter-pill">Paracetamol</button>
            <button class="filter-pill">Action</button>
            <button class="filter-pill">Antipyretic</button>
            <button class="filter-pill">Analgesic</button>
            <button class="filter-pill delete">Delete</button>
        </div>

        <div class="product-grid">
            <!-- Aspirin -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Aspirin" class="product-image" style="background-color: #FFDD80;">
                <div class="product-info">
                    <h3 class="product-name">Aspirin</h3>
                    <p class="product-description">Pain relief medication</p>
                    <p class="product-price">100 tablets, $5.99</p>
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>

            <!-- Ibuprofen -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Ibuprofen" class="product-image" style="background-color: #E0E0E0;">
                <div class="product-info">
                    <h3 class="product-name">Ibuprofen</h3>
                    <p class="product-description">Anti-inflammatory drug</p>
                    <p class="product-price">200 mg, $8.49</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>

            <!-- Paracetamol -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Paracetamol" class="product-image" style="background-color: #F5F5F5;">
                <div class="product-info">
                    <h3 class="product-name">Paracetamol</h3>
                    <p class="product-description">Fever and pain reducer</p>
                    <p class="product-price">500 mg, $4.99</p>
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>

            <!-- Hydrocortisone -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Hydrocortisone" class="product-image" style="background-color: #E8E0D5;">
                <div class="product-info">
                    <h3 class="product-name">Hydrocortisone</h3>
                    <p class="product-description">Skin inflammation treatment</p>
                    <p class="product-price">1 oz, $12.99</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>

            <!-- Vitamin C -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Vitamin C" class="product-image" style="background-color: #FFE0B2;">
                <div class="product-info">
                    <h3 class="product-name">Vitamin C</h3>
                    <p class="product-description">Immune support supplement</p>
                    <p class="product-price">60 count, $9.99</p>
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>

            <!-- Albuterol -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Albuterol" class="product-image" style="background-color: #E6E6FA;">
                <div class="product-info">
                    <h3 class="product-name">Albuterol</h3>
                    <p class="product-description">Asthma and COPD treatment</p>
                    <p class="product-price">200 doses, $17.99</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>

            <!-- Loratadine -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Loratadine" class="product-image" style="background-color: #E0F2F1;">
                <div class="product-info">
                    <h3 class="product-name">Loratadine</h3>
                    <p class="product-description">Non-drowsy allergy relief</p>
                    <p class="product-price">30 tablets, $6.99</p>
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>

            <!-- Calcium -->
            <div class="product-card">
                <img src="/placeholder.svg?height=250&width=250" alt="Calcium" class="product-image" style="background-color: #F5F5F5;">
                <div class="product-info">
                    <h3 class="product-name">Calcium</h3>
                    <p class="product-description">Bone health support</p>
                    <p class="product-price">120 count, $11.99</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>