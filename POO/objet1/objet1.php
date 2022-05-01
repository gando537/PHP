<?php
    require("class.php");

    $action1 = new action();
    $action1->nom = "Mortendi";
    $action1->cours = 1.15;

    echo "<b>L'action de $action1->nom cotée $action1->bourse vaut $action1->cours
    &euro;</b><hr>";

    $action1->info();
    echo "<hr>La structure de l'objet \$action1 est : <br>";
    var_dump($action1);
    echo "<h4> Descriptif de l'action</h4>";

    foreach($action1 as $prop=>$valeur)
        echo "$prop = $valeur <br />";

    if ($action1 instanceof action)
        echo "<hr/>L'objet \$action1 est du type action";
?>