<?php
 function helloWorld(){
 return "Hello World!";
 }
echo helloWorld();

 function quiEstLeMeilleurProf(){
     return "Mon super formateur de Dev Web";
 }
 echo "<br>";
 echo quiEstLeMeilleurProf();

function jeRetourneMonArgument($abc){
return $abc;
}
echo "<br>";
echo jeRetourneMonArgument(123);

function concatenation($argument1,$argument2){
    return $argument1.$argument2;
}
echo concatenation("Yo","moé");

function concatenationAvecEspace($arg1,$arg2){
    return $arg1." ".$arg2;
}
echo concatenationAvecEspace("Marie","Sommier");
?>
