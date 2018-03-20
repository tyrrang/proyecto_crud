<?php

include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Usuario.php';

//Obtiene el id de la entidad a modificar
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$usuario = new Usuario($db);

$usuario->id = $id;
$usuario->readId();

//Establece la cabecera
$page_title = "Eliminar usuario";
include_once '../layout_header.php'; //headers	
?>

<!-- Visualiza t�tul de la pagina -->
<h1><?php echo $page_title ?></h1>

<form action="" method="post">
    <table class="table table-hover">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" id="nombre" value="<?php echo $usuario->nombre; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type="text" name="apellidoP" id="apellidoP" value="<?php echo $usuario->apellidoP; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type="text" name="apellidoM" id="apellidoM" value="<?php echo $usuario->apellidoM; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Edad</td>
            <td><input type="number" name="edad" id="edad" value="<?php echo $usuario->edad; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Sexo</td>
            <td><input type="text" name="sexo" id="sexo" value="<?php echo $usuario->sexo; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Correo Electronico</td>
            <td><input type="text" name="correoElec" id="correoElec"  value="<?php echo $usuario->correoElec; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><input type="text" name="contrasenia" id="contrasenia"  value="<?php echo $usuario->contrasenia; ?>"  class="form-control" readonly="readonly"></td>
        </tr>                
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" name="enviar" id="enviar" class="btn btn-primary">Eliminar</button></td>
        </tr>

    </table>
</form>


<?php

//Vía método POST
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $usuario = new Usuario($db);   
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellidoP = $_POST['apellidoP'];
    $usuario->apellidoM = $_POST['apellidoM'];
    $usuario->edad = $_POST['edad'];
    $usuario->sexo = $_POST['sexo'];
    $usuario->correoElec = $_POST['correoElec'];
    $usuario->contrasenia = $_POST['contrasenia'];
    
    if ($usuario->delete($id)) {
        echo "<div class='alert alert-success'>Usuario eliminado exitosamente.</div>";
        $usuario->nombre = '';
        $usuario->apellidoP = '';
        $usuario->apellidoM = '';
        $usuario->edad = '';
        $usuario->sexo = '';
        $usuario->correoElec = '';
        $usuario->contrasenia = '';
        
    } else {
        echo "<div class='alert alert-danger'>No es posible eliminar el usuario.</div>";
    }

}
?>


<?php
include_once '../layout_footer.php'; //footer
?>