<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothercare - Configure Auto Reminder</title>
    <link rel="stylesheet" href="css/reminder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <i class="fas fa-bolt"></i>
            </div>
            <h1>Apothercare</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search.php">Advanced Search</a></li>
                <li><a href="prescription.php" class="active">Prescriptions</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <div class="icon-button">
                <i class="fas fa-bell"></i>
            </div>
            <div class="icon-button">
                <i class="fas fa-cog"></i>
            </div>
            <div class="icon-button">
                <i class="fas fa-search"></i>
            </div>
            <div class="profile-pic">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Untitled-tVYyjSe2HUEZ6S9deRLDGI0ZKhQX6f.png" alt="Profile Picture">
            </div>
        </div>
    </header>

    <main>
        <h1 class="page-title">Configure Auto Reminder</h1>
        
        <div class="reminder-container">
            <h2>Set reminders to never miss a dose</h2>
            
            <div class="frequency-options">
                <label class="checkbox-container">
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                    <span class="label">Daily</span>
                </label>
                
                <label class="checkbox-container">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span class="label">Weekly</span>
                </label>
                
                <label class="checkbox-container">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span class="label">Monthly</span>
                </label>
            </div>
            
            <div class="time-selector">
                <h2>At Time</h2>
                <div class="time-inputs">
                    <input type="number" value="00" class="time-input" placeholder="00" max="12" min="1">
                    <input type="number" value="00" class="time-input" placeholder="00" max="59" min="0">
                    <div class="am-pm-toggle">
                        <button class="am active">AM</button>
                        <button class="pm">PM</button>
                    </div>
                </div>
            </div>
            
            <button class="save-button">Save Settings</button>
        </div>
    </main>
</body>
</html>