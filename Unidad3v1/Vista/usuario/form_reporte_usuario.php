<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Reporte de Usuario</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!-- Meta Mobil
        ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row padding">
                <div class="col-md-12">
                    <?php
                    $h1 = "Reporte de Usuario";
                    echo '<h1>' . $h1 . '</h1>'
                    ?>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>A. PATERNO</th>
                            <th>A. MATERNO</th>
                            <th>NOMBRES</th>
                            <th>AREA</th>
                            <th>SUELDO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $user['dni']; ?></td>
                            <td><?php echo $user['paterno']; ?></td>
                            <td><?php echo $user['materno']; ?></td>
                            <td><?php echo $user['nombres']; ?></td>
                            <td><?php echo $user['area']; ?></td>
                            <td>S/. <?php echo $user['sueldo']; ?></td>
                        </tr>

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