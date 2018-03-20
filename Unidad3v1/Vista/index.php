<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="utf-8"
    </head>
    <body>

        <h1>Accede al sistema</h1>
        <hr/>

        <!--<form action="checklogin.php" method="post" >-->
        <form method="POST">
            <label>Nombre Usuario:</label> <br>
            <input name="correoElec" type="text" id="correoElec" required>
            <br><br>

            <label>Password:</label><br>
            <input name="contrasenia" type="password" id="contrasenia" required>
            <br><br>

            <?php

            include_once '../Configuracion/Database.php';
            include_once '../Modelo/Usuario.php';


            if ($_POST) {
                //Llena el objeto $usuario con los parámetros enviados
                
                $database = new DataBase();
                $db = $database->getConexion();
                echo '1';
                $usuario = new Usuario($db);

                $correo = $usuario->correoElec = $_POST['correoElec'];
                $pass = $usuario->contrasenia = $_POST['contrasenia'];

                if ($usuario->accede($correo, $pass)) {
                    header("Location: usuario/home.php");
                } else {
                   echo "<div class='alert alert-danger'>No es posible agregar el usuario.</div>";
                }
            }
            ?>

            <input type="submit" name="Submit" value="Acceder">

        </form>


    </body>
</html>

