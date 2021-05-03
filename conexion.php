
<?php

    function conectar(){
        $pdo = new PDO("mysql:host=localhost;dbname=taller;port=3306;charset=utf8", "root", "") or die();
        return $pdo;
    }

?>