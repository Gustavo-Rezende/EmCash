<?php


class ConexaoBancoDados {
    
    private $banco; 

    //Campos para serem preenchidos com informações dos bancos de dados
    private $db_host;
    private $db_user;
    private $db_password;
    private $db_name;
    private $db_driver;
    private static $connection;

    //Método construtor do banco de dados
    public function __construct($banco){

        $this->banco = $banco;       
        switch ($this->banco) {
            //Conexão com MySql
            case 1:
                $this->db_host = "localhost";
                $this->db_user = "root";
                $this->db_password = "";
                $this->db_name = "apicash";
                $this->db_driver = "mysql";
            break;           

        }
    }

    //Método que retorna conexão com o banco de dados escolhido na variável $banco
    public function getConnection(){
            
        try {
              $connection = new PDO('mysql:host=localhost;dbname=apicash', 'root', '');
              // $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
        catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            } 
        
        return $connection;
    }
    
    /**
     * @param $sql string com instrução SQL (SELECT * FROM tabela WHERE campo = :param)
     * @param $param array de parâmentros [:param => $valor]
     */

    // Método para fazer select e retornar um array de objetos
    public function dbSelect($sql, $param = null){
        $query = $this->getConnection()->prepare($sql);        
        $query->execute($param);          
        return $query->fetchAll(PDO::FETCH_OBJ);   
    }

    //Método para fazer insert de valores no banco de dados
    public function dbInsert($sql, $param = null){
        $query = $this->getConnection()->prepare($sql);
        $query->execute($param);   
        // $rs = $this->getConnection()->lastInsertId() or die(print_r($query->errorInfo(),true));
        // return $rs;
    }

    //Método para fazer delete de valores do banco de dados
    public function dbDelete($sql, $param = null){
        $query = $this->getConnection()->prepare($sql);
        $query->execute($param);  
        // $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));   
        // return $rs;  
    }

    //Método para fazer update de valores do banco de dados
    public function dbUpdate($sql, $param = null){
        $query = $this->getConnection()->prepare($sql);
        $query->execute($param);   
        // $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
        // return $rs;
    }    

}