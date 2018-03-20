<?php

    class Database {

            // Declaración de variables.
            private $host ='localhost';
            private $database = 'Unidad3JCampos';
            private $usuario = 'user_php';
            private $password = 'php';
            private $con;

            // Función que retornara la conexcion.
            public function getConexion(){
                $this->con = null;
                try {
                    $this->con = new PDO('mysql:host='.
                    $this->host.';dbname='.$this->database,
                                       $this->usuario, $this->password);
                } catch (PDOException $e) {
                    echo 'No puede conectarse con la base de datos'.
                            $e->getMessage();
                }
                return $this->con;

            }
    }
