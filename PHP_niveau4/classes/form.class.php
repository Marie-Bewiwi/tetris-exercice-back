<?php
class Form
{
    private $code; // code complet du formulaire
    private $codeinit; // code de l'entete du formulaire : balises form + fielset + legend
    private $codetext; // code de chaque input
    private $codesubmit; // code du bouton submit

    public function __construct($action, $titre, $method)
    {
        $this->codeinit = "<form action='$action' method='$method'><fieldset><legend><span>$titre</span></legend>";

    }

    //********************************************
    public function settext($name, $libelle)
    {
        $this->codetext .= "<label for='$name'>$libelle</label> <input type='text' name='$name' >";
        // notez que si vous appelez plusieurs fois la fonction settext, les input se concatènent
    }

    //************************************************
    public function setsubmit($name = "envoi", $value = "Envoyer")
    {
        $this->codesubmit = "<input type='submit' name='$name' value='$value'></input>";
    }

    //**************************
    public function getform()
    {
        $this->code = ""; //initialisation de la chaine qui contiendra le reste
        $this->code .= $this->codeinit;
        $this->code .= $this->codetext;
        $this->code .= $this->codesubmit;
        $this->code .= "</fieldset></form>";
        echo $this->code;
    }
}
