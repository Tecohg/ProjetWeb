let symboleJoueur=null; //symbole du joueur X ou O

function afficherTableau(tableau,tour,gagnant,j1,j2) {
    monSymbole = (me===p1) ? 'X' : 'O';
    //on parcourt chaques cases du tableau pour les traiter 
    document.querySelectorAll('.case').forEach((element,index) => {
        //affiche l'état de la case
        element.textContent = tableau[i] === '-' ? '' : tableau[i];

        //on donne a chaques cases jouable la classe "libre" 
        //si la case est vide, si la partie n'est pas finie et si c'est mon tour.
        if (tableau[i] === '-' && !gagnant && turn===me) {
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
        status1.textContent='c\'est le tour de {$tour$}';
        document.getElementById('btnReset').style.display='none';

    }
}


function getState(){
    fetch('getState.php')
    .then(r => r.json)
    .then(data => {console.log(data);})
}

/*Je trouve où les ports ?