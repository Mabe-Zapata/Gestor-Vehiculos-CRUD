<?php
include_once "../Models/cruds.php";
$opc = $_SERVER['REQUEST_METHOD'] ;
switch($opc){
    case 'GET':
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case 'insert':
                    Cruds::insertCarro();
                    break;
                case 'update':
                    Cruds::updateCarro();
                    break;
                case 'delete':
                    Cruds::deleteCarro();
                    break;
            }
        } else {
            if(isset($_GET['txtBuscar'])){
                Cruds::buscarCarro();
            }
            elseif(isset($_GET['txtPlaca'])){
                Cruds::buscarPorPlaca();
            }
            elseif(isset($_GET['txtMarca'])){
                Cruds::buscarPorMarca();
            }
            else{
                Cruds::selectCarro();
            }
        }
        break;
    case 'POST':
        Cruds::insertCarro();
        break;
    case 'DELETE':
        Cruds::deleteCarro();
        break;
    case 'PUT':
        Cruds::updateCarro();
        break;
}
?>