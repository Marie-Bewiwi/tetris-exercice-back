<?php

function loadrss($url)
{

    $xmlDoc = new DOMDocument(); // ça vous rappelle quelque chose ? un flux RSS, c'est du XML et il se trouve que tous les document XML (dont le HTML est une forme particulière) sont navigable via un DOM
    $xmlDoc->load($url); // on initialise ce DOM avec l'url de notre flux

    // Récupération des infos du flux dans la balise "<channel>"
    $channel = $xmlDoc->getElementsByTagName('channel')->item(0);
    // notez la notation fléchée (php objet). On navigue dans ce DOM comme vous avez appris à le faire en javascript

    // récupération du titre du flux
    $channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;

    // récupération du lien du flux
    $channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;

    // récupération de la description du flux
    $channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

    // génération du contenu à partir des infos du flux dans "<channel>"
    echo ("<p><a href='" . $channel_link . "'>Bienvenue sur le flux RSS de " . $channel_title . "</a>");
    echo ("<br>");
    echo ("Description : " . $channel_desc . "</p>");

    // on va ensuite afficher les 3 premiers éléments du flux et les récupérant manuellement
    $items = $xmlDoc->getElementsByTagName('item');
    $itemslength = count($items);
    for ($i = 0; $i < $itemslength; $i++) {
        $item = $items->item($i);
        $imageurl = $item->getElementsbyTagName('thumbnail')->item(0)->getAttribute('url');
        echo "<p>" . $item->getElementsbyTagName('title')->item(0)->childNodes->item(0)->nodeValue . "</p>";
        echo $item->getElementsbyTagName('link')->item(0)->childNodes->item(0)->nodeValue . "<br/>";
        echo "<img src = '$imageurl'> </img>";
        echo $item->getElementsbyTagName('description')->item(0)->childNodes->item(0)->nodeValue . "<br/>";
        echo $item->getElementsbyTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
    }

}

// on appelle la fonction qu'on a écrite sur le flux RSS de notre choix
loadrss("https://www.jeuxvideo.com/rss/rss.xml");
