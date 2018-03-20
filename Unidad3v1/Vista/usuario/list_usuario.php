<?php
include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Usuario.php';

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$usuario = new Usuario($db);

//Establece la cabecera
$page_title = "Listar usuarios";
include_once '../layout_header.php'; //headers	

echo $page_title;

$usuario->gridHTMLConsulta();

include_once '../layout_footer.php';
?>
