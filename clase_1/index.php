
<?php

    $nombre = "Mario";

    echo "HOLA MUNDO, mi nombre es $nombre";

    $array = array(1,2,3,"4", "cinco");

    echo "<br>";
    echo "<br>";

    var_dump($array);

    echo "<br>";
    echo "<br>";

    foreach ($array as $value) {
        # code...
        echo " $value";
    }

    $array_asoc = array("Juan" => 1,"Carolina" => 2,
     "Javier" => 3, "Susana" => "4","Perla" => "cinco");

     foreach ($array_asoc as $key => $value) {
         # code...
         echo " <br> $key => $value";
     }
