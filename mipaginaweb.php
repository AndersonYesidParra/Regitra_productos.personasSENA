<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="image/logo.ico">
    <script src="https://kit.fontawesome.com/bf91727cf2.js" crossorigin="anonymous"></script>
    <title>Productos</title>
</head>
<body>
    <ul >
        <li><a href="mipaginaweb.php">Inicio</a></li>
        <li><a href="contacto.html">contacto</a></li>
    </ul>
    <br>
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Marca</th>
                <th>Fecha Compra</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Movimiento</th>
                <th>Foto</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 

                include_once("conexion.php");

                $c = conectar();

                try{
                    $sql = "SELECT id, codigo, marca, fechaCompra, cantidad, pais, movimiento FROM productos";
                    $stm = $c->prepare($sql);                    
                    $stm->execute();
                    
                    $datos = $stm->fetchAll();

                    foreach($datos as $producto){
                        
                        ?>

                        <tr>
                            <td><?php echo $producto["codigo"] ?></td>
                            <td><?php echo $producto["marca"] ?></td>
                            <td><?php echo $producto["fechaCompra"] ?></td>
                            <td><?php echo $producto["cantidad"] ?></td>
                            <td><?php echo $producto["pais"] ?></td>
                            <td><?php echo $producto["movimiento"] ?></td>
                            <td></td>
                            <td><a href="registrarProducto.php?id=<?php echo $producto["id"] ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a  onclick="javascript:return confirm('¿Desea cancelar este producto?');" href="eliminarProducto.php?id=<?php echo $producto["id"] ?>;"><i class="fas fa-trash-alt"></i></a></td>                            
                        </tr>

                        <?php
                    }
        
                }catch(Exception $ex){
                    echo"error";
                    echo $ex;
                }           
            
            ?>
        </tbody>

    </table>
    <br>
   
        <div>
            <i class="fas fa-share-square"></i>
            <a href="registrarProducto.php">Insertar producto</a>
        </div>
        <br>
        <div>
        <i class="fas fa-user-plus"></i>
        <a href="registraempleado.php">Registrar Personas</a>
        </div>
        <br>
        <div>
        <i class="fas fa-users"></i>
            <a href="personas.php">Personas</a>
        </div>
        
        <script>
            function eliminar(id){
                debugger;
                if(confirm("Do yo want to delete this product?")){
                    window.location.href = "eliminarProducto.php?id="+id;
                }
            }
        </script>
</body>
</html>