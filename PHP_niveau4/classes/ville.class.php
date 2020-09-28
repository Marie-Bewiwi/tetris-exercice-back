<?php
class ville
{
    public $nom;
    public $departement;

    public function getinfo()
    {
        return "La ville de " . $this->nom . " est dans le département : " . $this->departement . "<br/>"; // réfléchir à ce que cette méthode doit renvoyer
    }
}
