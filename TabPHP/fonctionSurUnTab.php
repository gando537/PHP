<?php
    /**
     * array_walk() avec deux parametres
     */
    $tab = range(1,10);

    function tabval($val, $ind)
    {
        echo "<tr><td><b>", $ind + 1, "</b></td><td>".cos(M_PI/$val)."</td></tr>";
    }

    echo "<table border=\"3\"><tr>
    <td> <h2>Tableau de valeurs</h2>
    <table border=\"1\"><thead><th> x </th><th> cos(pi/x)</th></thead>";
    array_walk($tab, "tabval");
    echo "</table></td> ";

    /**
     * array_walk() avec trois parametres
     */
    $prix = array("22"=>"5.50", "32.50"=>"19.60", "80.00"=>"19650");

    function taxe($taux, $prix, $col)
    {
        echo "<tr><td > $prix </td><td > $taux </td><td>". $prix * ($taux / 100).
        "</td><td style=\"background-color:$col \">". $prix * (1 + $taux / 100). "</td></ tr>";
    }
    echo "<td><h2>Facture détaillée</h2>
    <table border=\"1\" >
    <thead><th> h.t</th><th> taux</th><th> t.v.a.</th><th> t.t.c.</th></thead>";
    array_walk($prix, "taxe", "green");
    echo "</td></tr></table></table>";
?>