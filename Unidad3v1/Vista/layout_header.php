<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content ="width=divece-width, initical-scale=1">
        <title><?php echo $page_title ?></title>
 
        <!-- Enlace a bootstrap -->
        <link rel="stylesheet" href="../../Media/css/bootstrap.min.css">
        <!-- Enlace a mi estilo -->
        <link rel="stylesheet" href="../../Media/css/miestilo.css">
        <link rel="stylesheet" href="../../Media/css/navegacion.css">
    </head>
    <body>
        <br><br><br>
        <div id="header">
            <ul class="nav">
                <li><a href="">Inicio</a></li>
                <li><a href="">Usuario</a>
                    <ul>
                        <li><a href="../usuario/crea_usuario.php">Registrar Usuario</a></li>
                        <li><a href="../usuario/list_usuario.php">Consultar Usuario</a></li>
                        <li><a href="../usuario/list_delete_usuario.php">Eliminar Usuario</a></li>
                        <li><a href="../usuario/list_update_usuario.php">Actualizar Usuario</a></li>
                        <li><a href="../usuario/list_reporte_usuario.php">Reporte a Usuario</a></li>
                    </ul>
                </li>
                <li><a href="">Producto</a>
                    <ul>
                        <li><a href="../producto/crea_producto.php">Registrar Producto</a></li>
                        <li><a href="../producto/list_producto.php">Consultar Producto</a></li>
                        <li><a href="../producto/delete_producto.php">Eliminar Producto</a></li>
                        <li><a href="../producto/update_producto.php">Actualizar Producto</a></li>
                    </ul>
                </li>
                <li><a href="">Proveedor</a>
                    <ul>
                        <li><a href="../proveedor/crea_proveedor.php">Registrar Proveedor</a></li>
                        <li><a href="../proveedor/list_proveedor.php">Consultar Proveedor</a></li>
                        <li><a href="../proveedor/list_delete_proveedor.php">Eliminar Proveedor</a></li>
                        <li><a href="../proveedor/list_update_proveedor.php">Actualizar Proveedor</a></li>
                    </ul>
                </li>
                <li><a href="">Pelicula</a>
                    <ul>
                        <li><a href="../pelicula/crea_pelicula.php">Registrar Pelicula</a></li>
                        <li><a href="../pelicula/list_pelicula.php">Consultar Pelicula</a></li>
                        <li><a href="../pelicula/list_delete_pelicula.php">Eliminar Pelicula</a></li>
                        <li><a href="../pelicula/list_update_pelicula.php">Actualizar Pelicula</a></li>
                    </ul>
                </li>
                <li><a href="">Cine</a>
                    <ul>
                        <li><a href="../cine/crea_cine.php">Registrar Cine</a></li>
                        <li><a href="../cine/list_pelicula.php">Consultar Cine</a></li>
                        <li><a href="../cine/list_delete_cine.php">Eliminar Cine</a></li>
                        <li><a href="../cine/list_update_pelicula.php">Actualizar Cine</a></li>
                    </ul>
                </li>                                
            </ul>
        </div>


        <div class="container">
            <div class="page-header">
                <h1><?php $page_title ?></h1>
            </div>
        </div>
        
    </body>
</html>