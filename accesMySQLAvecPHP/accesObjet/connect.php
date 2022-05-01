<?php
    function connectObjet($db, $param)
    {
        include_once($param.".inc.php");
        $idcom = new mysqli(MYHOST, MYUSER, MYPASS, $db);
        if (!$idcom)
        {
            echo "<script type=text/javascript>";
            echo "alert('Connexion Impossible à la base de données $db')</script>";
            exit ();
        }
        return $idcom;
    }
?>