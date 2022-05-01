<?php
    class action
    {
        private $_nom ;
        private $_cours ;
        protected $_bourse ;

        function __construct($nom, $cours, $bourse="Paris")
        {
            $this->_nom = $nom ;
            $this->_cours = $cours ;
            $this->_bourse = $bourse ;
        }

        function __destruct()
        {
            echo "L'action $this->_nom est détruit <br />";
        }
    }

    $alcotel = new action("Alcotel", 10.21);
    $bouch = new action("Bouch", 9.11, "New York");
    $bim = new action("BIM", 34.50, "New York");

    $ref = &$bim;
    var_dump($alcotel);
    echo "<hr />";
    unset($alcotel);
    unset($bim);
    echo "<hr/><h4>FIN du script</h4><hr/>";
?>