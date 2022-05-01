<?php
    //Creation d'une classe dérivée de Exception
    class MyException extends Exception
    {
        public function alerte()
        {
            $this->message = "<script type=\"text/javascript\">alert('Erreur n°"
            .$this->getCode()." \\n".$this->getMessage()." ' )</script> ";
            return $this->getMessage();
        }
    }

    $a = 100;
    $b = 0;

    try
    {
        if ($b == 0)
            throw new MyException("Division par 0", 7);
        else if ($a % $b != 0)
            throw new MyException("Quotient entier impossible", 55);
        else
            echo "Résultat de : \$a / \$b = ". $a / $b. "<br><hr>";
    }
    catch(MyException $except)
    {
        echo $except->alerte();
    }
    echo "FIN";
?>