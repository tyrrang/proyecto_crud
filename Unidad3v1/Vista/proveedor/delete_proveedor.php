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


$page_title = "Eliminar proveedor";
include_once '../layout_header.php'; //headers	
?>

<h1><?php echo $page_title ?></h1>


<form action="" method="post">
    <table class="table table-hover">
        <tr>
            <td>Nombre del proveedor</td>
            <td><input type="text" name="NombreProv" id="nombre" value="<?php echo $proveedor->nombreProv; ?>" class="form-control" readonly="readonly"></td>
        </tr>
        <tr>
            <td>RFC</td>
            <td><input type="text" name="RFC" id="apellidoP" value="<?php echo $proveedor->rfc; ?>" class="form-control" readonly="readonly"></td>
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
    $proveedor = new Proveedor($db);   

    if ($proveedor->delete($id)) {
        echo "<div class='alert alert-success'>Proveedor eliminado exitosamente.</div>";
        $proveedor->nombreProv = '';
        $proveedor->rfc = '';
    } else {
        echo "<div class='alert alert-danger'>No es posible eliminar el usuario.</div>";
    }

}
?>

<?php
include_once '../layout_footer.php'; //footer
?>