<?php
class personne
{
    private $nom;
    private $prenom;
    private $adresse;

    //Constructeur
    public function __construct($nom, $prenom, $adresse)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
    }

    //Destructeur
    public function __destruct()
    {
        echo "<script type=\"text/javascript\">alert('La personne nommée $this->prenom $this->nom \\n est supprimée de vos contacts')</script>";
    }

    /** renvoie une représentation de la personne sous la forme d'une chaine de caractère.
    Vous pouvez choisir d'afficher le prénom, puis le nom suivi de l'adresse par exemple**/
    public function getPersonne() // un getteur n'a jamais de paramètre

    {
        return $this->prenom . " " . $this->nom . " habite à " . $this->adresse . ". <br/>";
    }

    public function setadresse($newAdresse)
    {
        $this->adresse = $newAdresse;
    }
}
