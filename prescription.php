<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare - Upload Prescription</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/prescription.css">

</head>
<body>
    <header>
        <div class="logo">
            <i class="fas fa-bolt"></i>
            <h1>Apothecare</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search.php">Advanced Search</a></li>
                <li><a href="prescription.php" class="active">Prescriptions</a></li>
            </ul>
        </nav>
        <div class="user-controls">
            <i class="fas fa-bell"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-search"></i>
            <div class="avatar">
                <img src="/placeholder.svg?height=40&width=40" alt="User avatar">
            </div>
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