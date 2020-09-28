<?php
class ville
{
    private $nom;
    private $departement;

    public function __construct($n, $dpt)
    {
        $this->nom = $n;
        $this->departement = $dpt;
    }
    public function getInfo()
    {
        return "La ville de ~ " . $this->nom . " ~ est dans le département : " . $this->departement . "<br/>"; // réfléchir à ce que cette méthode doit renvoyer
    }
}
