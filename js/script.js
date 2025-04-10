function headToRegister(){
    const btn = document.getElementById('register-btn')
    btn.addEventListener('click', () => {
        window.location.href = 'register.php'
    })
}

function headToLogout(){
    window.location.href = 'logout.php'
}

headToRegister()
