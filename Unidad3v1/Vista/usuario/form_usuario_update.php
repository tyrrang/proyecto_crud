<form action="" method="post">
    <table class="table table-hover">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" id="nombre" value="<?php echo $usuario->nombre; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type="text" name="apellidoP" id="apellidoP" value="<?php echo $usuario->apellidoP; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type="text" name="apellidoM" id="apellidoM" value="<?php echo $usuario->apellidoM; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Edad</td>
            <td><input type="number" name="edad" id="edad" value="<?php echo $usuario->edad; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Sexo</td>
            <td><input type="text" name="sexo" id="sexo" value="<?php echo $usuario->sexo; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Correo Electronico</td>
            <td><input type="text" name="correoElec" id="correoElec"  value="<?php echo $usuario->correoElec; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><input type="text" name="contrasenia" id="contrasenia"  value="<?php echo $usuario->contrasenia; ?>"  class="form-control"></td>
        </tr>                
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" name="enviar" id="enviar" class="btn btn-primary">Eliminar</button></td>
        </tr>

    </table>
</form>