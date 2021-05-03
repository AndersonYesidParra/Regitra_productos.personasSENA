<?php 

    include_once("conexion.php");

    if($_POST){
        $usuario = $_POST['nombre'];
        $password = $_POST['contraseña'];

        $c = conectar();

        try{
            $sql = "SELECT COUNT(*) FROM usuarios WHERE nombre = ? and password = ?";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $usuario);
            $stm->bindValue(2, $password);        
            $stm->execute();
            
            $datos = $stm->fetch();

            if($datos[0] > 0){
                header('location: mipaginaweb.php');
            }

        }catch(Exception $ex){
            echo"error";
            echo $ex;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="image/logo.ico">
    <script src="https://kit.fontawesome.com/bf91727cf2.js" crossorigin="anonymous"></script>
    <style>
        body{
            background: url(image/fondo.webp);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body>
   <form action="" method="POST">
        <section>
            <h1>Iniciar Sección</h1>
        <div class="dato">
        <i class="far fa-address-card"></i>
            <label for="nombre" class="blanco">Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="dato">
            <i class="fas fa-unlock-alt"></i>
            <label for="contraseña" class="blanco">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña">
        </div>
        <div class="dato">
            <button type="submit" class="btn" >Ingresar</button>
            <a href="registro.html" class="btn">Registrarse</a>
        </div>
        
    </section>
   </form>
    
</body>
</html>