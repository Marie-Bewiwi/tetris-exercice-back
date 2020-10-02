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

    // on va ensuite afficher les 3 premiers éléments du flux et les récupérant manuellement
    echo "<h2 class='text-center'>Bienvenue sur le feed RSS de <a href='$channel_link'>$channel_title</a></h2>";
    $items = $xmlDoc->getElementsByTagName('item');
    $itemslength = count($items);
    for ($i = 0; $i < $itemslength; $i++) {
        $item = $items->item($i);
        $article_img = $item->getElementsbyTagName('thumbnail')->item(0)->getAttribute('url');
        $article_title = $item->getElementsbyTagName('title')->item(0)->childNodes->item(0)->nodeValue;
        $article_link = $item->getElementsbyTagName('link')->item(0)->childNodes->item(0)->nodeValue;
        $article_desc = $item->getElementsbyTagName('description')->item(0)->childNodes->item(0)->nodeValue;
        $article_date = $item->getElementsbyTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
        $date_unix = strtotime($article_date);
        $date_formatee = date('l d F Y H:i ', $date_unix);
        echo "<div class='container card-group'>
            <div class='card mb-5'>
                <img src='$article_img' class='card-img-top'/>
                <div class='card-body'>
                    <a href='$article_link'><h5 class='card-title'>$article_title</h5></a>
                    <p class='card-text'>$article_desc</p>
                </div>
                <div class='card-footer'>
                    <small class='text-muted'>$date_formatee</small>
                </div>
            </div>
     </div>";
    }

}

// on appelle la fonction qu'on a écrite sur le flux RSS de notre choix
loadrss("https://www.jeuxvideo.com/rss/rss.xml");
