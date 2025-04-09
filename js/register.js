function headToLogin() {
    const btn = document.getElementById('login');
    if (btn) {
        btn.addEventListener('click', () => {
            window.location.href = 'login.php';
        });
    } else {
        console.error("Element met ID 'login' niet gevonden!");
    }
}

headToLogin();
