
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link rel="stylesheet" href="css/styless.css">
    <script src="https://kit.fontawesome.com/bf91727cf2.js" crossorigin="anonymous"></script>
</head>
<body>

<table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLDIO</th>
                <th>TIPO DE CEDULA</th>
                <th>CEDULA</th>
                <th>TIPO</th>
                <th>CORREO</th>
                <th>MODIFICAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        include_once("conexion.php");

        $c = conectar();

        try{
            $sql = "SELECT id, nombre, apellido, tipocedula, cedula,  tipo, correo FROM personas";
            $stm = $c->prepare($sql);
            $stm->execute(); 

            $datos = $stm->fetchAll();

            foreach($datos as $persona){
                ?>
                <tr>
                    <td><?php echo $persona["nombre"]?></td>
                    <td><?php echo $persona["apellido"]?></td>
                    <td><?php echo $persona["tipocedula"]?></td>
                    <td><?php echo $persona["cedula"]?></td>
                    <td><?php echo $persona["tipo"]?></td>
                    <td><?php echo $persona["correo"]?></td>
                    <td><a href="registraempleado.php?id=<?php echo $persona["id"] ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a onclick="javascript:return confirm('¿Desea eliminar esta persona?');" href="eliminarPersona.php?id=<?php echo $persona["id"] ?>"><i class="fas fa-trash-alt"></a></td>
                </tr>

                <?php
            }

        }
        catch(Exception $a){

            echo "Error $a";

        }

        ?>
        
        </tbody>
</table>
        

</body>
</html>