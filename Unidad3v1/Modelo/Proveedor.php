<?php

class Proveedor {

    //Declaración de variables
    public $id;
    public $nombreProv;
    public $rfc;
    public $con;
    public $tabla = 'proveedor';

    /**
     * Constructor unico para el usuario.
     * @param type $pCon
     */
    public function __construct($pCon) {
        $this->con = $pCon;
    }

    public function inserta() {
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (NombreProv, RFC) VALUES  ' . " ('" . $this->nombreProv . "','" .
                $this->rfc . "')";

        $stmt = $this->con->prepare($insert);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function read() {

        $query = 'Select id, NombreProv, RFC' .
                ' From ' . $this->tabla .
                ' Order by Id';
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function __toString() {

        return 'NombreProv=' . $this->nombreProv . ' RFC=' . $this->rfc;
    }

    public function readId() {
        $query = 'Select id, NombreProv, RFC' .
                ' From ' . $this->tabla .
                ' Order by Id';

        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nombreProv = $row['NombreProv'];
        $this->rfc = $row['RFC'];
    }

    public function update() {
        $update = "UPDATE " . $this->tabla .
                " SET " .
                " NombreProv='" . $this->nombreProv . "'," .
                " RFC='" . $this->rfc . "'" .
                " where id=" . $this->id;

        $stmt = $this->con->prepare($update);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function gridHTMLConsulta() {
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre del Provedor</th>" .
                "<th>RFC</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['id'] . "</td>" .
                        "<td>" . $row['NombreProv'] . "</td>" .
                        "<td>" . $row['RFC'] . "</td>" .
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
                "<th>Nombre del Provedor</th>" .
                "<th>RFC</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['id'] . "</td>" .
                        "<td>" . $row['NombreProv'] . "</td>" .
                        "<td>" . $row['RFC']; // . "</td>" .

                $tableHtml = $tableHtml . "</td>" .
                        "<td><a href='update_proveedor.php?id=" . $row['id'] . "' class='btn btn-info left-margin'>"
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
                "<th>Nombre del Provedor</th>" .
                "<th>RFC</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['id'] . "</td>" .
                        "<td>" . $row['NombreProv'] . "</td>" .
                        "<td>" . $row['RFC']; // . "</td>" .

                $tableHtml = $tableHtml . "</td>" .
                        "<td><a href='delete_proveedor.php?id=" . $row['id'] . "' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Eliminar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
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

}
