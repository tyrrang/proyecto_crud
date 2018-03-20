<?php

include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Proveedor.php';

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$proveedor = new Proveedor($db);

//Establece la cabecera
$page_title = "Registrar proveedor";
include_once '../layout_header.php'; //headers	
?>

<h1><?php echo $page_title ?></h1>

<?php
include_once 'form_proveedor.php';
?>

<?php

//Vía método POST
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $proveedor = new Proveedor($db);   
    $proveedor->nombreProv = $_POST['nombreProv'];
    $proveedor->rfc = $_POST['rfc'];

    if ($proveedor->nombreProv == NULL){
        echo "<div class='alert alert-danger'>Falta agregar el nombre del proveedor.</div>";
        return;
    }elseif ($proveedor->rfc == NULL) {
        echo "<div class='alert alert-danger'>Falta agregar el rfc del proveedor.</div>";
        return;
    }

    if ($proveedor->inserta()) {
        echo "<div class='alert alert-success'>Proveedor agregado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>No es posible agregar el proveedor.</div>";
    }

}
?>

<?php
include_once '../layout_footer.php'; //footer
?>
