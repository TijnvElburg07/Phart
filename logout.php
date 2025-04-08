<?php
session_start();

// Alle sessievariabelen leegmaken
$_SESSION = array();

// Sessie-cookie verwijderen als die bestaat
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Sessie vernietigen
session_destroy();

// Redirect naar loginpagina of homepage
header("Location: login.php");
exit();
?>
