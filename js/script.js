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

document.getElementById('llmForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const prompt = document.getElementById('prompt').value;

    const res = await fetch('/ask', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ prompt })
    });

    const data = await res.json();
    document.getElementById('llmResponse').textContent = data.response || 'Geen antwoord ontvangen.';
  });
