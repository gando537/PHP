<?php
    class valeur
    {
        protected $_nom ;
        protected $_prix;

        function __construct($nom, $prix)
        {
            $this->_nom = $nom;
            $this->_prix = $prix;
        }
        protected function getinfo()
        {
            $info = "<h4>Le prix de $this->_nom est de $this->_prix </h4>";
            return $info;
        }
    }

    class action extends valeur
    {
        public $bourse;

        function __construct($nom, $prix, $bourse="Paris")
        {
            parent::__construct($nom, $prix);
            $this->bourse = $bourse;
        }
        public function getinfo()
        {
            $info = "<h4>Action $this->_nom cotée à la bourse de $this->bourse </h4>";
            $info .= parent::getinfo();
            return $info;
        }
    }

    class emprunt extends valeur
    {
        private $_taux;
        private $_fin;

        function __construct($nom, $prix, $taux, $fin)
        {
            parent::__construct($nom, $prix);
            $this->_taux = $taux;
            $this->_fin = mktime(24, 0, 0, 12, 31, $fin);
        }
        public function getinfo()
        {
            $reste = round( ($this->_fin - time()) / 86400);
            $info = "<h3>Emprunt $this->_nom au taux de $this->_taux %</h3>";
            $info .= parent::getinfo();
            $info .= "<h4>Echéance : dans $reste jours </h4>";
            return $info;
        }
    }

    $action = new action("Alcotel", 9.76);
    echo $action->getinfo();
    $action2 = new action("BMI", 23.75, "New York");
    echo $action2->getinfo();
    $emprunt = new emprunt("EDF", 1000, 5.5, 2014);
    echo $emprunt->getinfo();
?>