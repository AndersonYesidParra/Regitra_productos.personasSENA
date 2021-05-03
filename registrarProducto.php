<script>
    
    function agregarDatos(codigo, marca, fecha, ubicacion, movimiento, descripcion, cantidadMaxima, cantidadMinima, fechaCompra, fechaCaducidad, precio, iva, aplicaIva, $pais){
        debugger;
        var codigo = document.querySelector('#codigo');
        var marca = document.querySelector('#marca');
        var nombre = document.querySelector('#nombre');
        var descripcion = document.querySelector('#descripcion');
        var maxima = document.querySelector('#maxima');
        var minima = document.querySelector('#minima');
        var compra = document.querySelector('#compra');
        var caducidad = document.querySelector('#caducidad');
        var si = document.querySelector('#si');
        var no = document.querySelector('#no');
        var iva = document.querySelector('#iva');
        var pais = document.querySelector('#pais');


        }

</script>
<?php 

    include_once("conexion.php");


    if($_POST){
        $codigo = $_POST['codigo'];
        $marca = $_POST['marca'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $maxima = $_POST['maxima'];
        $minima = $_POST['minima'];
        $compra = $_POST['compra'];
        $caducidad = $_POST['caducidad'];
        $precio = $_POST['precio'];
        $opcion = $_POST['opcion'];
        $iva = $_POST['iva'];
        $pais = $_POST['pais'];
        

        

        $c = conectar();

        try{
            $sql = "INSERT INTO productos (codigo, marca, fecha, cantidad, ubicacion, movimiento, descripcion, cantidadMaxima, cantidadMinima, fechaCompra, fechaCaducidad, precio, iva, aplicaIva, pais)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $codigo);
            $stm->bindValue(2, $marca);
            $stm->bindValue(3, $compra);
            $stm->bindValue(4, $maxima);
            $stm->bindValue(5, $pais);
            $stm->bindValue(6, 'Ingresado');            
            $stm->bindValue(7, $descripcion);
            $stm->bindValue(8, $maxima);
            $stm->bindValue(9, $minima);
            $stm->bindValue(10, $compra);
            $stm->bindValue(11, $caducidad);
            $stm->bindValue(12, $precio);
            $stm->bindValue(13, $iva);
            $stm->bindValue(14, $opcion);
            $stm->bindValue(15, $pais);
            $stm->execute();

            header("location: mipaginaweb.php");

        }catch(Exception $ex){
            echo "Error $ex";
        }
    }

    if($_GET){

        $id = $_GET["id"];
        $c = conectar();

        try{
            $sql = "SELECT codigo, marca, fecha, cantidad, ubicacion, movimiento, descripcion, cantidadMaxima, cantidadMinima, fechaCompra, fechaCaducidad, precio, iva, aplicaIva, pais FROM productos WHERE id = ?";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();

            $datos = $stm->fetch();            

            $codigo = $datos['codigo'];
            $marca = $datos['marca'];
            $fecha = $datos['fecha'];
            $ubicacion = $datos['ubicacion'];
            $movimiento = $datos['movimiento'];
            $descripcion = $datos['descripcion'];
            $cantidadMaxima = $datos['cantidadMaxima'];
            $cantidadMinima = $datos['cantidadMinima'];
            $fechaCompra = $datos['fechaCompra'];
            $fechaCaducidad = $datos['fechaCaducidad'];
            $precio = $datos['precio'];
            $iva = $datos['iva'];
            $aplicaIva = $datos['aplicaIva'];
            $pais = $datos['pais'];
            //agregarDatos($datos['codigo'], $datos['marca'], $datos['fecha'], $datos['cantidad'], $datos['ubicacion'], $datos['movimiento'], $datos['descripcion'], $datos['cantidadMaxima'], $datos['cantidadMinima'], $datos['fechaCompra'], $datos['fechaCaducidad'], $datos['precio'], $datos['iva'], $datos['aplicaIva'], $datos['pais']);
            echo "<script>  
                agregarDatos($codigo, $marca, $fecha, $ubicacion, $movimiento, $descripcion, $cantidadMaxima, $cantidadMinima, $fechaCompra, $fechaCaducidad, $precio, $iva, $aplicaIva, $pais);
            </script>";

        }catch(Exception $ex){
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Producto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1 class="tituloproducto">Formato de los Productos</h1>
        <form method="POST">
        <fieldset class="producto">
            <legend >Datos del producto</legend>
                <div>
                    <label for="codigo">Ingrese Codigo</label><br>
                    <input type="text" id="codigo" name="codigo" placeholder="Escribe el codigo" required="true">
                </div>
                <br>
                <div>
                    <label for="nombre">Ingrese Nombre</label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Escribe el nombre" required="true">
                </div>
                <br>
                <div>
                    <label for="descripcion">Ingrese su Descripción</label><br>
                    <textarea id="descripcion" name="descripcion" rows="5" cols="60"> </textarea>
                </div>
                <br>
                <div>
                    <label for="maxima">Ingrese Cantidad Maxima</label>
                    <input type="number" id="maxima" name="maxima" placeholder="Escribe cantidad maxima" required="true">
                </div>
                <br>
                <div>
                    <label for="minima">Ingrese Cantidad Minima</label>
                    <input type="number" id="minima" name="minima" placeholder="Escribe cantidad minima" required="true">
                </div>
                <br>
                <div>
                    <label for="compra">Ingrese Fecha Compra</label>
                    <input type="date" id="compra" name="compra" placeholder="Escribe fecha compra" required="true">
                </div>
                <br>
                <div>
                    <label for="caducidad">Ingrese Fecha Caducidad</label>
                    <input type="date" id="caducidad" name="caducidad" placeholder="Escribe fecha caducidad" required="true">
                </div>
                <br>
                <div>
                    <label for="precio">Ingrese Precio</label>
                    <input type="number" id="precio" name="precio" placeholder="Escribe precio" required="true">
                </div>
                <br>
                <div>
                    <label>Aplica IVA</label><br>
                    <input type="checkbox" id="si" name="opcion" value="1">
                    <label for="clasica">Si</label>
                    <br>
                    <input type="checkbox" id="no" name="opcion" value="0">
                    <label for="jazz">No</label>
                <br>
                </div>
                <div>
                    <label for="iva">Ingrese IVA</label>
                    <input type="number" id="iva" name="iva" placeholder="Escribe IVA" required="true">
                </div>
                <br>
                <div>
                    <label for="pais">Ingrese País</label>
                    <select name="pais" id="pais">
                        <option value="CO">Colombia</option>
                        <option value="EU">Estados unidos</option>
                        <option value="CA">Canada</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for="marca">Marca</label>
                    <select name="marca" id="marca">
                        <option value="cocacola">Coca-Cola</option>
                        <option value="nestle">Nestle</option>
                        <option value="poker">Poker</option>
                        <option value="alpina">Alpina</option>
                        <option value="postobon">Postobon</option>
                        <option value="colombina">Colombina</option>
                        <option value="alqueria">Alqueria</option>
                        <option value="bavaria">Bavaria</option>
                        <option value="queala">Quala</option>
                        <option value="ramo">Ramo</option>
                        <option value="yupi">Productos yupi</option>
                </div>
                <div>
                <br>
                <input type="submit" value="Registrar">
                </div>
        </fieldset>
        </form>            

        
    </body>
</html>