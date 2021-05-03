
<?php

include_once("conexion.php");

$editando = false;
$id = 0;

if($_POST){

    $tipoCedula = $_POST['tipocedula'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $tipo = $_POST['tipo'];
    $pais = $_POST['pais'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['hm'];

    if($_POST["envio"] == "Creando"){
        
    
        $c = conectar();
    
        try{
            $sql = "INSERT INTO personas (nombre, apellido, tipocedula, cedula, direccion, tipo, pais, departamento, municipio, correo, telefono, sexo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $nombre);
            $stm->bindValue(2, $apellido);
            $stm->bindValue(3, $tipoCedula);
            $stm->bindValue(4, $cedula);
            $stm->bindValue(5, $direccion);
            $stm->bindValue(6, $tipo);
            $stm->bindValue(7, $pais);
            $stm->bindValue(8, $departamento);
            $stm->bindValue(9, $municipio);
            $stm->bindValue(10, $correo);
            $stm->bindValue(11, $telefono);
            $stm->bindValue(12, $genero);
            $stm->execute();
    
            header("location: personas.php");
    
        }catch(Exception $x){
            echo "Error $x";
    
        }
    }else{

        
        $c = conectar();
        try{
            $sql = "UPDATE personas SET nombre = ?, apellido = ?, tipocedula = ?, cedula = ?, direccion = ?, tipo = ?, pais = ?, departamento = ?, municipio = ?, correo = ?, telefono = ?, sexo = ? WHERE id = ?";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $nombre);
            $stm->bindValue(2, $apellido);
            $stm->bindValue(3, $tipoCedula);
            $stm->bindValue(4, $cedula);
            $stm->bindValue(5, $direccion);
            $stm->bindValue(6, $tipo);
            $stm->bindValue(7, $pais);
            $stm->bindValue(8, $departamento);
            $stm->bindValue(9, $municipio);
            $stm->bindValue(10, $correo);
            $stm->bindValue(11, $telefono);
            $stm->bindValue(12, $genero);
            $stm->bindValue(13, $_GET["id"]);
            $stm->execute();

           header("location: personas.php");

        }catch(Exception $x){
            echo "Error $x";            
        }
    }
    
}

    if($_GET){
        $editando = true;
        $id = $_GET["id"];
        $c = conectar();

        try{
            $sql = "SELECT nombre, apellido, tipocedula, cedula, direccion, tipo, pais, departamento, municipio, correo, telefono, sexo FROM personas WHERE id = ?";
            $stm = $c->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();

            $datos = $stm->fetch();       

            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $tipocedula = $datos['tipocedula'];            
            $cedula = $datos['cedula'];
            $direccion = $datos['direccion'];
            $tipo = $datos['tipo'];
            $pais = $datos['pais'];
            $departamento = $datos['departamento'];
            $municipio = $datos['municipio'];
            $correo = $datos['correo'];
            $telefono = $datos['telefono'];
            $sexo = $datos['sexo'];
            
        echo "<script>  
        
            document.addEventListener('DOMContentLoaded' , function(){
                function agregarDatos(tipocedula, cedula, nombre, apellido, direccion, tipo, pais, departamento, municipio, correo, telefono, pais, hm){
            
                    var inTipoCedula = document.querySelector('#tipocedula');
                    var inCedula = document.querySelector('#cedula');
                    var inNombre = document.querySelector('#nombre');
                    var inApellido = document.querySelector('#apellido');
                    var inDireccion = document.querySelector('#direccion');
                    var inTipo = document.querySelector('#tipo');
                    var inPais = document.querySelector('#pais');
                    var inDepartamento = document.querySelector('#departemento');
                    var inMunicipio = document.querySelector('#municipio');
                    var inCorreo = document.querySelector('#correo');
                    var inTelefono = document.querySelector('#telefono');
                    var inPais = document.querySelector('#pais');
                    var inHm = document.getElementsByName('hm');
                
                    inTipoCedula.value = tipocedula;
                    inCedula.value = cedula;
                    inNombre.value = nombre;
                    inApellido.value = apellido;
                    inDireccion.value = direccion;
                    inTipo.value = tipo;
                    inPais.value = pais;
                    inDepartamento.value = departamento;
                    inMunicipio.value = municipio;
                    inCorreo.value = correo;
                    inTelefono.value = telefono;
                    inPais.value = pais;

                    if(hm == 'm'){
                        inHm[0].checked = true;
                    }else{
                        inHm[1].checked = true;
                    }                    
                }
        
                    agregarDatos('$tipocedula', '$cedula', '$nombre', '$apellido', '$direccion', '$tipo', '$pais', '$departamento', '$municipio', '$correo', '$telefono', '$pais', '$sexo');
            });
        
        </script>";


    }catch(Exception $e){

        echo "Error $e";

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro empleado</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <h1>Formulario de Regitro</h1>
   <form method="POST">
   <fieldset>
    <legend>Datos personales</legend>
    <section>
        <div>
            <label for="tipocedula">Tipo de cedula</label>
            <select name="tipocedula" id="tipocedula">
                <option value="seleccione">Seleccione...</option>
                <option value="targetaidentidad">Targeta de Identidad</option>
                <option value="cedulaciudadania">Cedúla de Ciudadanía</option>
                <option value="cedulaextranjera">Cedúla de Extranjería</option>
                <option value="contraseñaregistro">Contraseña Registraduría</option>
                <option value="pasaportecolombiano">Pasaporte Colombiano</option>
                <option value="pasaportextranjero">Pasaporte Extrajero</option>

            </select>
        </div>
        <br>
        <div>
            <label for="cedula">Ingrese su Cedula</label>
            <input type="number" id="cedula" name="cedula" placeholder="Escribe la cedula" required="true">
        </div>
        <br>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe el nombre" required="true">
        </div>
        <br>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Escribe el apellido" required="true">
        </div>
        <br>
        <div>
            <label for="direccion">Ingrese su Dirección</label>
            <input type="text" id="direccion" name="direccion" placeholder="Escribe tu dirección" required="true">
        </div>
        <br>
        <div>
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo">
                <option value="selecione">Seleccione...</option>
                <option value="empleado">Empleado</option>
                <option value="cliente">Cliente</option>
                <option value="proveedor">Proveedor</option>
            </select>
        </div>
        <br>
        <div>
            <label for="pais">Escribe su País</label>
            <input type="text" id="pais" name="pais" placeholder="Escribe tu país" required="true">
        </div>
        <br>
        <div>
            <label for="departamento">Escribe su Departamento</label>
            <input type="text" id="departemento" name="departamento" placeholder="Escribe tu departamento" required="true">
        </div>
        <br>
        <div>
            <label for="municipio">Escribe su Municipio</label>
            <input type="text" id="municipio" name="municipio" placeholder="Escribe tu municipio" required="true">
        </div>
        <br>
        <div>
            <label for="email">Ingrese el correo</label>
            <input type="email" name="correo" id="correo"  size="40">
        </div>
        <br>
        <div>
            <label for="telefono">Ingrese su Telefono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu telefeno" required="true">
        </div>
        <div>
            <p>sexo:
                <input type="radio" id="hm" name="hm" value="h">Hombre
                <input type="radio" id="hm" name="hm" value="m">Mujer
            </p>
            <p>
                
                <button type="submit" name="envio" value="<?php echo $_GET ? "Editando" : "Creando" ?>">Guardar</button>
                <input type="reset" value="Borrar">
            </p>
        </div>
        </section>
        </fieldset>
   </form>
   <script src="funciones.js" ></script>
</body>
</html>
