<form action="" method="post">
    <table class="table table-hover">
        <tr>
            <td>Nombre del proveedor</td>
            <td><input type="text" name="nombreProv" id="nombreProv" class="form-control" value="<?php echo $proveedor->nombreProv; ?>"></td>
        </tr>
        <tr>
            <td>RFC</td>
            <td><input type="text" name="rfc" id="rfc" class="form-control" value="<?php echo $proveedor->rfc; ?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type="submit" name="enviar" id="enviar" class="btn btn-primary">Insertar</button></td>
        </tr>

    </table>
</form>