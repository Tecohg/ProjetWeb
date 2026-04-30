let monSymbole=null; //symbole du joueur X ou O

function afficherTableau(tableau,tour,gagnant,j1,j2) {
    monSymbole = (me===j1) ? 'X' : 'O';
    //on parcourt chaques cases du tableau pour les traiter 
    document.querySelectorAll('.case').forEach((element,index) => {
        //affiche l'état de la case
        element.textContent = tableau[index] === '-' ? '' : tableau[index];

        //on donne a chaques cases jouable la classe "libre" 
        //si la case est vide, si la partie n'est pas finie et si c'est mon tour.
        element.className='case';
        if (tableau[index] === '-' && !gagnant && tour===me) {
            element.classList.add('jouable'); 
        }
    });

    const status1 = document.getElementById('status');

    if (gagnant === 'égalité') {
        
        status1.textContent = /*Liberté !!!*/'Egalité !!!'/*Fraternité !!!*/;
        document.getElementById('btnReset').style.display = 'block'   
    }
    else if (gagnant) {
        if (gagnant ===monSymbole) {
            status1.textContent= 'Gagné';
        }
        else {
            status1.textContent= 'Perdu';
        }
        document.getElementById('btnReset').style.display='block';
    }
    else {
        status1.textContent=`C'est le tour de ${tour}`;
        document.getElementById('btnReset').style.display='none';

    }
}


function etat(){
    fetch('etatMorpion.php')
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            afficherTableau(data.tableau,data.tour,data.gagnant,data.j1,data.j2)
        }
        else {
            //dans le cas ou il y à un probleme venant des données reçu par le fetch
            document.getElementById('status').textContent=data.error;
        }
    });
}

function jouer(index) {
    fetch('play.php', {
        method:'POST',
        headers:{'Content-Type': 'application/x-www-form-urlencoded'},
        body:`case=${index}`})
        .then(r => r.json())
        .then (data =>  {
            if (data.ok) {
                etat();
            }
            else {
                alert(data.error);
            }
    });
}
//redemarre la partie
document.getElementById('btnReset').addEventListener('click', () => {
    fetch('resetMorpion.php', { method: 'POST' })
        .then(r => r.json())
        .then(() => etat());
});


//les cases sont clickable
document.querySelectorAll('.case').forEach(element => {
    element.addEventListener('click', () => {
        //on joue seulement sur les cases jouable
        if (element.classList.contains('jouable')) {
            jouer(element.dataset.index); 
        }
    });
});

etat();

setInterval(etat,2000);