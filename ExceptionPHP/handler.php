<?php

    /**
     * Cet exemple n'a pour but que pour illustrer l'utlisation des méthodes
     * de l'objet Exception. En production , vous n'afficherez pas toutes ces
     * informations
     */
    $a = 100;
    $b = 2;

    try
    {
        if ($b == 0)
            throw new Exception("Division par 0", 7);
        else
            echo "Résultat de : \$a / \$b = ". $a / $b. "<br><hr>";
    }
    catch(Exception $except)
    {
        echo "Message d'erreur : ".$except->getMessage()."<hr>";
        echo "Nom du fichier : ".$except->getFile()."<hr>";
        echo "Numéro de ligne : ".$except->getLine()."<hr>";
        echo "Code d'erreur : ".$except->getCode()."<hr>";
        echo "__toString : ".$except->__toString()."<hr>";
    }
    echo "FIN";
?>