<?php
function triangle($tailletriangle){
    $star="**";
    echo "<p style=\"text-align:center\">";
    for ($i=0;$i<=$tailletriangle;$i++){
        $stars=str_repeat($star,$i);
        echo "<br>".$stars;
    }
    echo "</p>";
}
echo triangle(10);

?>