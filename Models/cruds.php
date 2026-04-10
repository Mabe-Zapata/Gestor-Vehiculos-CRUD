<?php

include_once("conexion.php");
class Cruds
{
    public static function selectCarro()
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        $sqlSelect = "select * from carros";
        $resultado = $conexion->prepare($sqlSelect);
        $resultado->execute();
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }

   public static function buscarCarro()
    {
        $terminoBusqueda=$_GET['txtBuscar'];
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        $sqlSelect = "SELECT * FROM carros 
                      WHERE marca LIKE :termino 
                      OR modelo LIKE :termino
                      OR placa LIKE :termino"
                      ;
                      
        $resultado = $conexion->prepare($sqlSelect);
        $parametro = '%' . $terminoBusqueda . '%';
        //el bind evita inyeccion
        $resultado->bindParam(':termino', $parametro, PDO::PARAM_STR);
        $resultado->execute();
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($datos);
    }

    public static function buscarPorPlaca()
    {
        $terminoBusqueda = $_GET['txtPlaca'];
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        $sqlSelect = "SELECT * FROM carros WHERE placa = :placa";
        $resultado = $conexion->prepare($sqlSelect);
        $resultado->bindParam(':placa', $terminoBusqueda, PDO::PARAM_STR);
        $resultado->execute();
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }
    public static function buscarPorMarca()
    {
        $terminoBusqueda = $_GET['txtMarca'];
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        $sqlSelect = "SELECT * FROM carros WHERE marca = :marca";
        $resultado = $conexion->prepare($sqlSelect);
        $resultado->bindParam(':marca', $terminoBusqueda, PDO::PARAM_STR);
        $resultado->execute();
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }

    public static function insertCarro() {
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $placa = $_GET['placa'];
        $chasis = $_GET['chasis'];
        $anio = $_GET['anio'];
        $color = $_GET['color'];

        $sqlInsert = "INSERT INTO carros (marca, modelo, placa, chasis, anio, color) 
                      VALUES (:marca, :modelo, :placa, :chasis, :anio, :color)";
        
        $resultado = $conexion->prepare($sqlInsert);
        $resultado->bindParam(':marca', $marca, PDO::PARAM_STR);
        $resultado->bindParam(':modelo', $modelo, PDO::PARAM_STR);
        $resultado->bindParam(':placa', $placa, PDO::PARAM_STR);
        $resultado->bindParam(':chasis', $chasis, PDO::PARAM_STR);
        $resultado->bindParam(':anio', $anio, PDO::PARAM_INT);
        $resultado->bindParam(':color', $color, PDO::PARAM_STR);
        
        $resultado->execute();
        echo json_encode("Se inserto correctamente el carro");
    }

    public static function deleteCarro() {
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        $placa = $_GET['placa'];
        $sqlDelete = "DELETE FROM carros WHERE placa = :placa";
        $resultado = $conexion->prepare($sqlDelete);
        $resultado->bindParam(':placa', $placa, PDO::PARAM_STR);
        $resultado->execute();
        echo json_encode("Se elimino correctamente el carro");
    }
    
    public static function updateCarro() {
        $objConexion = new Conexion();
        $conexion = $objConexion->Conectar();
        
        $placa_original = $_GET['placa_original']; // Usamos un parámetro distinto para el WHERE
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $placa_nueva = $_GET['placa'];
        $chasis = $_GET['chasis'];
        $anio = $_GET['anio'];
        $color = $_GET['color'];

        $sqlUpdate = "UPDATE carros SET marca = :marca, modelo = :modelo, placa = :placa_nueva, 
                      chasis = :chasis, anio = :anio, color = :color WHERE placa = :placa_original";
        
        $resultado = $conexion->prepare($sqlUpdate);
        $resultado->bindParam(':marca', $marca, PDO::PARAM_STR);
        $resultado->bindParam(':modelo', $modelo, PDO::PARAM_STR);
        $resultado->bindParam(':placa_nueva', $placa_nueva, PDO::PARAM_STR);
        $resultado->bindParam(':chasis', $chasis, PDO::PARAM_STR);
        $resultado->bindParam(':anio', $anio, PDO::PARAM_INT);
        $resultado->bindParam(':color', $color, PDO::PARAM_STR);
        $resultado->bindParam(':placa_original', $placa_original, PDO::PARAM_STR);
        
        $resultado->execute();
        echo json_encode("Se actualizo correctamente el carro");
    }
}



?>