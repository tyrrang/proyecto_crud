<?php
include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Proveedor.php';

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$proveedor = new Proveedor($db);

//Establece la cabecera
$page_title = "Listar de proveedores que puedes eliminar";
include_once '../layout_header.php'; //headers	

echo $page_title;

$proveedor->gridHTMLDelete();

include_once '../layout_footer.php';
?>