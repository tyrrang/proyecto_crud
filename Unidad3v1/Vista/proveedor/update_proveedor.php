<?php

include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Proveedor.php';

//Obtiene el id de la entidad a modificar
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$proveedor = new Proveedor($db);

$proveedor->id = $id;
$proveedor->readId();

//Establece la cabecera
$page_title = "Actualizar proveedor";
include_once '../layout_header.php'; //headers	
?>
<!-- Visualiza t�tul de la pagina -->
<h1><?php echo $page_title ?></h1>

<?php
include_once 'form_proveedor_update.php';
?>

<?php

//Vía método POST
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    //$usuario = new Usuario($db);   
    $proveedor->nombreProv = $_POST['nombreProv'];
    $proveedor->rfc = $_POST['rfc'];
    
    if ($proveedor->nombreProv === NULL){
        echo "<div class='alert alert-danger'>Falta agregar el nombre del proveedor.</div>";
        return;
    }elseif ($proveedor->rfc == NULL) {
        echo "<div class='alert alert-danger'>Falta agregar el rfc del proveedor.</div>";
        return;
    }
    
    if ($proveedor->update($id)) {
        echo "<div class='alert alert-success'>Proveedor actualizado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible actualizar el proveedor.</div>";
    }

}
?>

<?php
include_once '../layout_footer.php'; //footer
?>
