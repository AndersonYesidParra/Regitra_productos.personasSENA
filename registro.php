<?php

include_once("conexion.php");

$nombre = $_POST['nombre'];
$apellido =  $_POST['apellido'];
$contraseña = $_POST['contraseña'];
$correo = $_POST['correo'];

$c = conectar();

try{
    $sql = "INSERT INTO usuarios(nombre, apellido, password, correo) VALUES (?, ?, ?, ?)";
    $stm = $c->prepare($sql);
    $stm->bindValue(1, $nombre);
    $stm->bindValue(2, $apellido);
    $stm->bindValue(3, $contraseña);
    $stm->bindValue(4, $correo);
    $stm->execute();
    header('location: index.php');
}catch(Exception $ex){
    print"error";
}
?>