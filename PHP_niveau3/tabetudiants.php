<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau étudiants</title>
</head>
<body>
<?php
//question1
$notes = [
    "Roger" => 12,
    "Monica" => 16,
    "Najat" => 15,
];
//question 2
$notes["Anton"] = 10;
print_r($notes);
//question 3
unset($notes['Monica']);
print_r($notes);
//question 4
$notemaxi = max($notes);
$notemini = min($notes);
echo "<br> La note maximale du groupe est: " . $notemaxi;
echo "<br> La note minimale du groupe est: " . $notemini . "<br>";
//question 5
ksort($notes);
print_r($notes);
//question 6
arsort($notes);
print_r($notes);
//question 7
$moyennenotes = array_sum($notes) / count($notes);
echo "<br>La moyenne de la classe est :" . $moyennenotes;

?>
</body>
</html>
