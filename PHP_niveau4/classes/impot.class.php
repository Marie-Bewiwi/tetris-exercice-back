<?php
class impot
{

    private const pauvre = 0.15;
    private const riche = 0.20;
    private $nom;
    private $revenus;
    private $taux;

    public function __construct($nom, $revenus)
    {
        $this->nom = $nom;
        $this->revenus = $revenus;
    }

    public function calculImpots($revenus)
    {
        if ($revenus < 15000) {
            $taux = impot::pauvre * $revenus;
            return $this->taux = $taux;
        } else if ($revenus > 15000) {
            $taux = impot::riche * $revenus;
            return $this->taux = $taux;
        }
    }

    public function afficheImpots($nom, $fonction)
    {
        echo "Monsieur/Madame " . $this->nom . " votre impôt est de " . $this->taux . " €.";
    }
}
