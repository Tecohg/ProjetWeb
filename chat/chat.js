let dernierIndex=0;

function afficherMessage(exp,msg,date) {
    const div= document.createElement('div');
    div.className='message' + (exp===me ? 'me' : 'other');
    div.innerHTML = '${msg} <div class="date">${date}</dive>';
    document.getElementById('messages').appendChild(div);
    document.getElementById('messages').scrollTop = 9999;
}

function chargerMessages() {
    fetch(`getMessages.php?avec=${other}&depuis=${dernierIndex}`)
        .then(r => r.json())
        .then(messages => {
            messages.forEach(m => {
                afficherMessage(m.exp, m.msg, m.date);
                dernierIndex = m.index + 1;
            });
        });
}

function envoyer() {
    const input = document.getElementById('input');
    const msg = input.value.trim();
    if (!msg) return;
    fetch('send.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded' }, /* https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Methods/POST */
        body: 'destinataire=${other}&message=${encodeURIComponent(msg)}'
    })
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            afficherMessage(MIDIOutput,mmsg, Date().toLocaleString());
            input.value = '';
        }
    });
}

document.getElementById('btnEnvoyer').addEventListener('click',envoyer);
document.getElementById('input').addEventListener('keydown',e => {
    if (e.key === 'Enter') envoyer();
});


chargerMessages();
setInterval(chargerMessages,2000);