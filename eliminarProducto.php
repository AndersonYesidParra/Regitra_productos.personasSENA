<?php 

    include_once("conexion.php");

    if($_GET){

        $id = $_GET["id"];
        $c = conectar();

        try{
            $sql = "DELETE FROM productos WHERE id = ?";
            $pst = $c->prepare($sql);
            $pst->bindValue(1, $id);
            $pst->execute();

            header("location: mipaginaweb.php");

        }catch(Exception $ex){
            echo "Error $ex";
        }



    }