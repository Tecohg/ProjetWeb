<?php
if(isset($_POST['ok'])){ 
    extract($_POST);    #recupère les valeurs du formulaire inscription
    #echo $nom;
    #équivaut à $nom = $_POST['nom'] pour tout les names du form (donc nom et mdp)
}

?>