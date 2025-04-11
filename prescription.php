<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phart - Upload Prescription</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/prescription.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <a href="search.php" class="nav-item ">Producten</a>
            <a href="prescription.php" class="nav-item active">Prescriptions</a>
        </nav>
        </div>
        <div class="header-right">
            <i class="fas fa-bell"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-search"></i>
            <img src="/placeholder.svg?height=35&width=35" alt="Profile" class="profile">
        </div>
    </header>

    <main>
        <h1 class="page-title">Upload Prescription</h1>
        
        <div class="upload-container">
            <div class="drag-drop-area">
                <h2>Drag & Drop your files here</h2>
                <p>Please upload a valid prescription (PDF, JPG, or PNG)</p>
            </div>
            
            <div class="divider">
                <span>or</span>
            </div>
            
            <button class="upload-btn">Upload File</button>
            
            <div class="file-list">
                <div class="file-item">
                    <div class="file-info">
                        <i class="fas fa-file-pdf"></i>
                        <span>Prescription.pdf</span>
                    </div>
                    <button class="delete-btn">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="file-item">
                    <div class="file-info">
                        <i class="fas fa-file-pdf"></i>
                        <span>Prescription(1).pdf</span>
                    </div>
                    <button class="delete-btn">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <button class="submit-btn">Submit</button>
        </div>
    </main>
</body>
</html>