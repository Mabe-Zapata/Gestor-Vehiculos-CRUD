<?php

class Conexion
{
    public function Conectar()
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "vehiculos_db";
      
        try {
            $conn = new PDO("mysql:host=$server;dbname=$database",
             $user, $password);
       
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
}


?>