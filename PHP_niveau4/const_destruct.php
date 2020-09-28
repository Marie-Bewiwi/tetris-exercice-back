<?php
require "classes/personne.class.php";
$client = new personne("Geelsen", "Jan", " 145 Rue du Maine Nantes");
echo $client->getPersonne();

//Modification de l'adresse
$client->setadresse("23 Avenue Foch Lyon");
echo $client->getPersonne();

// Le destructeur est appelé à 2 moments
// - soit lorsque vous supprimez vous-même une variable avec l'usage de "unset" qui désalliue l'espace mémoire occupé par la variable en appelant le destructeur
// - soit de manière automatique lorsque le garbage collector passe pour nettoyer la mémoire de ce qui n'est plus utilisé (par exemple en fin de script php)

// pour bien comprendre quand le destructeur est appelé amusez-vous à passer le booléen suivant à vrai ou faux et exécutez le script
$explicit_destruct = true;

if ($explicit_destruct) {
    //Suppression explicite du client avec unset, donc appel implicite au destructeur
    unset($client);
    echo $client . ' unset, appel au destructeur pour libérer la mémoire occupée par $client<br>';
}

if (isset($client)) {
    echo $client . ' existe encore, il va être nettoyé par le garbage collector en faisant appel à son destructeur<br>';
}

echo "Fin du script";
//Fin du script, le destructeur est appelé sur tous les objects encore vivants. Si $explicit_destruct est à false et donc si $client existe encore à ce stade du script, alors le destructeur sera appelé sur $client.
