<?php

namespace Source\Controllers;

use Source\Models\PoligonosModel;

require_once "../../vendor/autoload.php";
require_once "../ConexaoBancoDados.php";
require_once "../Model/PoligonosModel.php";

switch($_SERVER["REQUEST_METHOD"]){    
     case "GET":
        header("HTTP/1.1 200 OK");
        $Poligono = new PoligonosModel;        
        $Resultado = $Poligono->ConsultaPoligono();        
        if(empty($Resultado)){
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(array("response"=>"Nenhum registro encontrado"));
            die();
        }else{
            $return = array();
            foreach($Resultado as $result){
                //Tratamento dos dados vindos do banco
                array_push($return,$result);
                echo json_encode(array("response"=>$return));
            }
        }             
     break;
     default:
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(array("response"=>"Método não previsto nesta API"));
     break;


      case "POST":


      $Poligono = new PoligonosModel;
        

        $Tipo = $_POST['Tipo'];
        try{
           if($Tipo == 1){

                $Cadastro = $Poligono->CadastrarTriangulo($Tipo, $_POST['Nome'], $_POST['LadoA'], $_POST['LadoB'], $_POST['LadoC']);
                
            }else if($Tipo == 2){

                $Cadastro = $Poligono->CadastrarRetangulo($Tipo, $_POST['Nome'], $_POST['LadoA'], $_POST['LadoB'], $_POST['LadoC'], $_POST['LadoD']);
            } 
        }
        catch (Exception $e){
            header("HTTP:/1.1 500 Internal Server Error");
            echo json_encode(array("response" => getMessage()));
            die();
        }        

        header("HTTP:/1.1 201 Created");
        echo json_encode(array("response" => "Poligono cadastrado com sucesso"));

     break;
}