<?php
include_once '../../Configuracion/Database.php';
include_once '../../Modelo/Usuario.php';

//obtiene la conexion hacia la base de datos
$database = new DataBase();
$db = $database->getConexion();
$usuario = new Usuario($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');



If ($_POST) {

    if ($usuario->generaReporte($id)) {
        if (isset($_POST['create_pdf'])) {
            require_once('../../Libreria/tcpdf/tcpdf.php');

            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Julio Cesar Campos Rangel');
            $pdf->SetTitle($_POST['reporte_name']);

            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetMargins(20, 20, 20, false);
            $pdf->SetAutoPageBreak(true, 20);
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->addPage();

            $content = '';

            $content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">' . $_POST['reporte_name'] . '</h1>

      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Correo Electronico</th>
            <th>Contraseña</th>
          </tr>
        </thead>
	';

            $content .= '
		<tr bgcolor="' . $color . '">
                    <td>' . $usuario['Nombre'] . '</td>
                    <td>' . $usuario['ApellidoP'] . '</td>
                    <td>' . $usuario['ApellidoM'] . '</td>
                    <td>' . $usuario['Edad'] . '</td>
                    <td>' . $usuario['Sexo'] . '</td>
                    <td>' . $usuario['correoElec'] . '</td>
                    <td>' . $usuario['Contrasenia'] . '</td>
        </tr>';
        }

        $content .= '</table>';

        $content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf Creator </span><a href="http://www.redecodifica.com">By Miguel Angel</a>
            </div>
        </div>

	';

        $pdf->writeHTML($content, true, 0, true, 0);

        $pdf->lastPage();
        $pdf->output('Reporte.pdf', 'I');
    } else {
        echo "<div class='alert alert-danger'>No se puede generar el reporte.</div>";
    }
}
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Exportar a PDF - Miguel Angel Caro Rojas</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!-- Meta Mobil
        ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Bootstrap -->
        <link href="../../Media/css/bootstrap.min.css" rel="stylesheet">
        <!--    <link href="css/style.css" rel="stylesheet">-->
    </head>

    <body>
        <div class="container-fluid">
            <div class="row padding">
                <div class="col-md-12">
                    <?php
                    $h1 = "Reporte de Empleados - Enero 2017";
                    echo '<h1>' . $h1 . '</h1>'
                    ?>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Correo Electronico</th>
                            <th>Contraseña</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             $usuario = $this->g();
                        while ($user = $usuario->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $user['Nombre']; ?></td>
                                <td><?php echo $user['ApellidoP']; ?></td>
                                <td><?php echo $user['ApellidoM']; ?></td>
                                <td><?php echo $user['Edad']; ?></td>
                                <td><?php echo $user['Sexo']; ?></td>
                                <td><?php echo $user['correoElec']; ?></td>
                                <td><?php echo $user['correoElec']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="col-md-12">
                    <form method="post">
                        <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                        <input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>