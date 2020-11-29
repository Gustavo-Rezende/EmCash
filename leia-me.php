<?php


// A URL aponta para o controller para o cadastro e retorno dos dados.
$url = "http://localhost/API_Emcash/restFullPhp/source/Controller/PoligonosController.php"; //Servidor  


/*
* Os parâmetros para cadastro dos dados são: Tipo (1 = Triângulo e 2 = Retângulo) Nome, LadoA, LadoB, LadoC, LadoD
* OBS: Caso seja triângulo não precisa colocar o parâmetro LadoD.
* Ao cadastrar os dados no método POST, passar os parâmetros pelo Body (x-www-form-urlencoded)
* Na pasta Exemplos terá um print de cadastro e outro de retorno dos dados via Postman.
* O banco de dados está na pasta Banco.
*/
