function afficherMessage(exp,msg,date) {
    const div= document.createElement('div');
    div.className='message ' + (exp===me ? 'me' : 'other');
    //div.innerHTML = `${msg} <div class="date">${date}</div>`; casse avec les apostrophes
    const msgSafe = msg.replace(/</g, '&lt;').replace(/>/g, '&gt;'); //j'ai pas trouver d'autre fix qu'avec claude :/
    div.innerHTML = `${msgSafe} <div class="date">${date}</div>`; 
    document.getElementById('messages').appendChild(div);
    document.getElementById('messages').scrollTop = 9999;
}

function chargerMessages() {
    fetch(`getMessages.php?other=${other}&depuis=0`)
        .then(r => r.json())
        .then(messages => {
            const div = document.getElementById('messages');
            div.innerHTML = '';
            messages.forEach(m => afficherMessage(m.exp, m.msg, m.date));
            div.scrollTop = 9999;
        });
}

function envoyer() {
    const input = document.getElementById('input');
    const msg = input.value.trim();
    if (!msg) return;
    fetch('send.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `destinataire=${other}&message=${encodeURIComponent(msg)}`
    }) /* ; erreur cette ligne, peut être ; juste avant la parenthèse */
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            input.value = '';
            chargerMessages(); 
        }
    });
}

document.getElementById('btnEnvoyer').addEventListener('click',envoyer);
document.getElementById('input').addEventListener('keydown',e => {
    if (e.key === 'Enter') envoyer();
});


chargerMessages();
setInterval(chargerMessages,2000);