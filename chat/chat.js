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
    })
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            input.value = '';
            chargerMessages(); 
        }
    });
}

function RechercherUtilisateurs() {
    const recherche = document.getElementById('recherche').value.toLowerCase();
    document.querySelectorAll('#liste-utilisateurs a').forEach(function(lien) {
        const nom = lien.textContent.toLowerCase();
        lien.style.display = nom.includes(recherche) ? 'block' : 'none';
    });
}

function AfficherInfos(e) {
    const envoyes = this.dataset.envoyes;
    const recus = this.dataset.recus;
    const total = this.dataset.total;
    if (envoyes === undefined) return;
    infos.innerHTML = `Stats.<br>Envoyés : ${envoyes}<br>Reçus : ${recus}<br>Total : ${total}`;
    infos.style.display = 'block';
    infos.style.left = (e.clientX + 10) + 'px';
    infos.style.top  = (e.clientY + 10) + 'px';
}

function DeplacerInfos(e) {
    infos.style.left = (e.clientX + 10) + 'px';
    infos.style.top  = (e.clientY + 10) + 'px';
}

function CacherInfos() {
    infos.style.display = 'none';
}

const infos = document.getElementById('infos-messages');

document.getElementById('btnEnvoyer').addEventListener('click',envoyer);
document.getElementById('recherche').addEventListener('input', RechercherUtilisateurs);document.querySelectorAll('.liste-users a').forEach(function(lien) {
    lien.addEventListener('mouseenter', AfficherInfos);
    lien.addEventListener('mousemove',  DeplacerInfos);
    lien.addEventListener('mouseleave', CacherInfos);
});
document.getElementById('input').addEventListener('keydown', e => {
if (e.key === 'Enter') envoyer();
});

document.querySelectorAll('.btn-morpion').forEach(btn => {
    btn.addEventListener('click', () => {
        const adversaire = btn.dataset.adversaire;
        fetch('../jeux/morpion/creerPartie.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `adversaire=${adversaire}`
        })
        .then(r => r.json())
        .then(data => {
            if (data.ok) window.location.href = '../jeux/morpion/jeu.php';
            else alert(data.error);
        });
    });
});


chargerMessages();
setInterval(chargerMessages,2000);