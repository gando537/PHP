<?php
    class action
    {
        const PARIS = "Palais Brognard" ;
        public $nom ;
        public $cours ;
        public $bourse = "Bourse de Paris";

        public function info()
        {
            echo "Information en date du ", date("d/m/Y H:i:s"), "<br>";
            $now = getdate();
            $heure = $now["hours"];
            $jour = $now["wday"];
            echo "<h3> Horaires des cotations</h3>";
            if (($heure >= 9 && $heure <= 17) && ($jour != 0 && $jour != 6))
                echo "La bourse de Paris est ouverte <br>";
            else
                echo "La bourse de Paris est fermée <br>";
            if (($heure >= 16 && $heure <= 23) && ($jour != 0 && $jour != 6))
                echo "La bourse de New York est ouverte <br>";
            else
                echo "La bourse de New York est fermée <br>";
        }
    }
?>