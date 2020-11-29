<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use ConexaoBancoDados;

class PoligonosModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct("dbTriangulo",["Codigo"],"CODIGO", false);
    }

    public function CadastrarTriangulo($Tipo, $Nome, $ladoA, $ladoB, $ladoC)
    {        
        $Conexao = new ConexaoBancoDados(1);

        $Total = $ladoA + $ladoB + $ladoC;

		$PARAM = ARRAY(':Tipo'=>$Tipo,
                        ':Nome'=>$Nome,
                        ':LadoA'=>$ladoA,
                        ':LadoB'=>$ladoB,
                        ':LadoC'=>$ladoC,
                        ':Total'=>$Total);			

        $query_Cadastro  = $Conexao->dbInsert("INSERT INTO Poligono (TipoPoligonoCodigo, PoligonoNome, PoligonoLadoA, PoligonoLadoB, PoligonoLadoC, PoligonoTotal) VALUES (:Tipo, :Nome, :LadoA, :LadoB, :LadoC, :Total)", $PARAM);
        
        return $query_Cadastro;
    }

    public function CadastrarRetangulo($Tipo, $Nome, $ladoA, $ladoB, $ladoC, $ladoD)
    {        
        $Conexao = new ConexaoBancoDados(1);

        $Total = $ladoA + $ladoB + $ladoC + $ladoD;

        $PARAM = ARRAY(':Tipo'=>$Tipo,
                        ':Nome'=>$Nome,
                        ':LadoA'=>$ladoA,
                        ':LadoB'=>$ladoB,
                        ':LadoC'=>$ladoC,
                        ':LadoD'=>$ladoD,
                        ':Total'=>$Total);

        $query_Cadastro  = $Conexao->dbInsert("INSERT INTO Poligono (TipoPoligonoCodigo, PoligonoNome, PoligonoLadoA, PoligonoLadoB, PoligonoLadoC, PoligonoLadoD, PoligonoTotal) VALUES (:Tipo, :Nome, :LadoA, :LadoB, :LadoC, :LadoD, :Total)", $PARAM);
                   
        return $query_Cadastro;
    }

    public function ConsultaPoligono()
    {        
        $Conexao = new ConexaoBancoDados(1);       

        $query_Consulta  = $Conexao->dbSelect("SELECT TipoPoligonoNome as Tipo, PoligonoNome as Nome, PoligonoTotal as Total FROM poligono P 
                                                INNER JOIN tipopoligono TP ON (P.TipoPoligonoCodigo = TP.TipoPoligonoCodigo)");
                   
        return $query_Consulta;
    }

}

