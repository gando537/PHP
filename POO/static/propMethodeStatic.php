<?php
    class info
    {
        public static $bourse = "Bourse de Paris";

        public static function getHeure()
        {
            $heure = date("h : m : s");
            return $heure;
        }
        public static function setBourse($val)
        {
            self::$bourse = $val;
        }
        public static function getBourse()
        {
            return self::$bourse;
        }
        public static function affiche()
        {
            $texte = self::$bourse.", il est ".self::getHeure();
            return $texte;
        }
    }

    echo info::$bourse, "<br />";
    echo info::getHeure(), "<br />";
    echo info::affiche(), "<br />";

    $objet = new info();
    $objet->setBourse("New York");
    echo "\$objet->bourse : ", $objet->getBourse(), "<hr />";
    echo "\$objet->getHeure() : ", $objet->getHeure(), "<hr />";
    echo "\$objet->affiche() : ", $objet->affiche(), "<hr />";
?>