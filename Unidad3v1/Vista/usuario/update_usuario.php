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
$page_title = "Actualizar usuario";
include_once '../layout_header.php'; //headers	
?>
<!-- Visualiza t�tul de la pagina -->
<h1><?php echo $page_title ?></h1>

<?php
include_once 'form_usuario_update.php';
?>

<?php

//Vía método POST
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    //$usuario = new Usuario($db);   
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellidoP = $_POST['apellidoP'];
    $usuario->apellidoM = $_POST['apellidoM'];
    $usuario->edad = $_POST['edad'];
    $usuario->sexo = $_POST['sexo'];
    $usuario->correoElec = $_POST['correoElec'];
    $usuario->contrasenia = $_POST['contrasenia'];
    
    
    if ($usuario->nombre === NULL){
        echo "<div class='alert alert-danger'>Falta agregar el nombre de usuario.</div>";
        return;
    }elseif ($usuario->apellidoP == NULL) {
        echo "<div class='alert alert-danger'>Falta agregar el apellido paterno del usuario.</div>";
        return;
    }elseif ($usuario->apellidoM == NULL){
        echo "<div class='alert alert-danger'>Falta agregar el apellido materno del usuario.</div>";
        return;
    }elseif ($usuario->edad == NULL){
        echo "<div class='alert alert-danger'>Falta agregar la edad del usuario.</div>";    
        return;
    }elseif ($usuario->edad > 0 && $usuario->edad < 18) {
        echo "<div class='alert alert-danger'>No se aceptan usuarios menores de edad.</div>";    
        return;
    }elseif ($usuario->edad > 100 || $usuario->edad < 0) {
        echo "<div class='alert alert-danger'>Favor de ingresar una edad valida.</div>";    
        return;
    }elseif ($usuario->sexo == NULL){
        echo "<div class='alert alert-danger'>Falta agregar el sexo del usuario.</div>";
        return;
    }elseif ($usuario->correoElec == NULL){
        echo "<div class='alert alert-danger'>Falta agregar el correo electronico del usuario.</div>";
        return;
    }elseif ($usuario->contrasenia == NULL){
        echo "<div class='alert alert-danger'>Falta agregar la contrasenia del usuario.</div>";
        return;
    }
    
    if ($usuario->update($id)) {
        echo "<div class='alert alert-success'>Usuario actualizado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible actualizar el usuario.</div>";
    }

}
?>

<?php
include_once '../layout_footer.php'; //footer
?>
