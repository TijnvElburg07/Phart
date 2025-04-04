function headToRegister(){
    const btn = document.getElementById('register-btn')
    btn.addEventListener('click', () => {
        window.location.href = 'register.php'
    })
}



headToRegister()