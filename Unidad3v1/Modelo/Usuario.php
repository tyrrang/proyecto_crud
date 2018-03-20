<?php

class Usuario {

    //Declaración de variables,
    public $id;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $edad;
    public $sexo;
    public $correoElec;
    public $contrasenia;
    public $con;
    public $tabla = 'usuario';

    /**
     * Constructor unico para el usuario.
     * @param type $pCon
     */
    public function __construct($pCon) {
        $this->con = $pCon;
    }

    /**
     * Función que permite insertar valores del usuario.
     */
    public function inserta() {
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (Nombre, ApellidoP, ApellidoM, Edad, Sexo, correoElec, ' .
                'Contrasenia ) VALUES ' . " ('" . $this->nombre . "','" .
                $this->apellidoP . "','" . $this->apellidoM . "','" . $this->edad
                . "','" . $this->sexo . "','" . $this->correoElec . "','"
                . $this->contrasenia . "')";

        $stmt = $this->con->prepare($insert);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * Función que consulta los registros 
     * @return type
     */
    public function read() {

        $query = 'Select Id,Nombre,ApellidoP,ApellidoM,Edad,Sexo,correoElec,' .
                'Contrasenia From ' . $this->tabla .
                ' Order by Id';
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function accede($correo, $pass) {

        $query = "Select Id ".
                  " From " . $this->tabla .
                " Where correoElec ='".$correo. "' " .
                " And Contrasenia ='".$pass."' ".
                ' Order by Id';
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function __toString() {

        return 'Nombre=' . $this->nombre . ' ApellidoP=' . $this->apellidoP . ' ApellidoM=' .
                $this->apellidoM . ' Edad=' . $this->edad . ' Sexo=' . $this->sexo .
                ' correoElec=' . $this->correoElec . ' Contrasenia=' . $this->contrasenia;
    }

    public function gridHTMLConsulta() {
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre</th>" .
                "<th>Apellido Paterno</th>" .
                "<th>Apellido Materno</th>" .
                "<th>Edad</th>" .
                "<th>Sexo</th>" .
                "<th>Correo Electronico</th>" .
                "<th>Contraseña</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['Id'] . "</td>" .
                        "<td>" . $row['Nombre'] . "</td>" .
                        "<td>" . $row['ApellidoP'] . "</td>" .
                        "<td>" . $row['ApellidoM'] . "</td>" .
                        "<td>" . $row['Edad'] . "</td>" .
                        "<td>" . $row['Sexo'] . "</td>" .
                        "<td>" . $row['correoElec'] . "</td>" .
                        "<td>" . $row['Contrasenia'] . "</td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }

    public function gridHTMLReporte() {
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre</th>" .
                "<th>Apellido Paterno</th>" .
                "<th>Apellido Materno</th>" .
                "<th>Edad</th>" .
                "<th>Sexo</th>" .
                "<th>Correo Electronico</th>" .
                "<th>Contraseña</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['Id'] . "</td>" .
                        "<td>" . $row['Nombre'] . "</td>" .
                        "<td>" . $row['ApellidoP'] . "</td>" .
                        "<td>" . $row['ApellidoM'] . "</td>" .
                        "<td>" . $row['Edad'] . "</td>" .
                        "<td>" . $row['Sexo'] . "</td>" .
                        "<td>" . $row['correoElec'] . "</td>" .
                        "<td>" . $row['Contrasenia']; // . "</td>" .

                $tableHtml = $tableHtml . "</td>" .
                        "<td><a href='reporte_pdf_usuario.php?id=" . $row['Id'] . "' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Reporte PDF</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }

    public function gridHTMLUpdate() {
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre</th>" .
                "<th>Apellido Paterno</th>" .
                "<th>Apellido Materno</th>" .
                "<th>Edad</th>" .
                "<th>Sexo</th>" .
                "<th>Correo Electronico</th>" .
                "<th>Contraseña</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['Id'] . "</td>" .
                        "<td>" . $row['Nombre'] . "</td>" .
                        "<td>" . $row['ApellidoP'] . "</td>" .
                        "<td>" . $row['ApellidoM'] . "</td>" .
                        "<td>" . $row['Edad'] . "</td>" .
                        "<td>" . $row['Sexo'] . "</td>" .
                        "<td>" . $row['correoElec'] . "</td>" .
                        "<td>" . $row['Contrasenia']; // . "</td>" .

                $tableHtml = $tableHtml . "</td>" .
                        "<td><a href='update_usuario.php?id=" . $row['Id'] . "' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Actualizar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }

    public function gridHTMLDelete() {
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre</th>" .
                "<th>Apellido Paterno</th>" .
                "<th>Apellido Materno</th>" .
                "<th>Edad</th>" .
                "<th>Sexo</th>" .
                "<th>Correo Electronico</th>" .
                "<th>Contraseña</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['Id'] . "</td>" .
                        "<td>" . $row['Nombre'] . "</td>" .
                        "<td>" . $row['ApellidoP'] . "</td>" .
                        "<td>" . $row['ApellidoM'] . "</td>" .
                        "<td>" . $row['Edad'] . "</td>" .
                        "<td>" . $row['Sexo'] . "</td>" .
                        "<td>" . $row['correoElec'] . "</td>" .
                        "<td>" . $row['Contrasenia']; // . "</td>" .

                $tableHtml = $tableHtml . "</td>" .
                        "<td><a href='delete_usuario.php?id=" . $row['Id'] . "' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Eliminar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }

    public function readId() {
        $query = 'Select Nombre,ApellidoP,ApellidoM,Edad,Sexo,correoElec,' .
                'Contrasenia From ' . $this->tabla .
                ' WHERE id= ' . $this->id .
                ' Order by Id ' .
                ' LIMIT 0,1';

        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nombre = $row['Nombre'];
        $this->apellidoP = $row['ApellidoP'];
        $this->apellidoM = $row['ApellidoM'];
        $this->edad = $row['Edad'];
        $this->sexo = $row['Sexo'];
        $this->correoElec = $row['correoElec'];
        $this->contrasenia = $row['Contrasenia'];
    }

    public function update() {
        $update = "UPDATE " . $this->tabla .
                " SET " .
                " nombre='" . $this->nombre . "'," .
                " apellidoP='" . $this->apellidoP . "'," .
                " apellidoM='" . $this->apellidoM . "'," .
                " edad='" . $this->edad . "'," .
                " sexo='" . $this->sexo . "'," .
                " correoElec='" . $this->correoElec . "'," .
                " contrasenia='" . $this->contrasenia . "'" .
                " where id=" . $this->id;

        $stmt = $this->con->prepare($update);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function generaReporte($value) {

        $query = 'Select Id,Nombre,ApellidoP,ApellidoM,Edad,Sexo,correoElec,' .
                'Contrasenia From ' . $this->tabla .
                ' WHERE id= ' . $value;

        $stmt = $this->con->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($value) {

        $delete = "DELETE FROM " . $this->tabla .
                " WHERE ID = " . $value;

        $stmt = $this->con->prepare($delete);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readOnly($value) {
        $query = 'Select Id,Nombre,ApellidoP,ApellidoM,Edad,Sexo,correoElec,' .
                'Contrasenia From ' . $this->tabla .
                ' WHERE id= ' . $value;

        $stmt = $this->con->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
