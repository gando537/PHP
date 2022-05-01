<?php
    function connect($db, $param)
    {
        include_once($param.".inc.php");
        $idcom = @mysqli_connect(MYHOST, MYUSER, MYPASS);
        $id_db = @mysqli_select_db($idcom, $db);
        if (!$idcom || !$id_db)
        {
            echo "<script type=text/javascript>";
            echo "alert('Connexion Impossible à la base de données $db')</script>";
        }
        return $idcom;
    }
?>