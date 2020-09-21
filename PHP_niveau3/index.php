<?php
if (!isset($_COOKIE['visite'])) {
    $data_date = date("d/m/Y H:i:s");
    setcookie('visite', $data_date, time() + 60 * 60 * 24);
} else {
    $data_date = $_COOKIE['visite'] . "|" . date("d/m/Y H:i:s");
    setcookie('visite', $data_date, time() + 60 * 60 * 24);
}
if (isset($_COOKIE['visite'])) {
    $tableaucookie = explode("|", $_COOKIE['visite']);
    echo "Vous avez visité cette page " . count($tableaucookie) . " fois, voici les détails :";
    echo "<ul>";
    for ($i = 0; $i < count($tableaucookie); $i++) {
        echo "<li>" . $tableaucookie[$i] . "</li>";
    }
    echo "<li>" . date("d/m/Y H:i:s") . "</li>";
    echo "</ul>";
} else {
    echo "C'est votre première visite : " . date("d/m/Y H:i:s");
}
