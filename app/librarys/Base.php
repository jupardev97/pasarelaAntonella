<?php

/*
  Clase Principal para Conectar con la Base de Datos y Ejecutar Las Consultas.
 */
class Base{
    private $host = DB_HOSTING;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;
    private $dbh; // Database Handler
    private $stmt; //statement
    private $error;

    public function __construct() {
        $options = [
            PDO::ATTR_PERSISTENT => true, //Optmizar los recursos del Servidor
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION//Optmizar los recursos del Servidor
        ];

        //Instanciar una conexion PDO::
        try {
            $this->dbh = new PDO( 'mysql:host='.$this->host.';dbname='.$this->db_name, $this->user, $this->password, $options);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage().' Line ->'.$ex->getLine();
            die($this->error);
        }
        
    }
    
    public function query( $sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind( $parameter, $value, $type = null){
        if( is_null($type)):
            switch (true):
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            endswitch;
        endif;
        $this->stmt->bindValue( $parameter, $value, $type);
    }//End Bin()
    
    public function execute(){
        return $this->stmt->execute();
    }
    
    public function requestAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function requestOne(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
}