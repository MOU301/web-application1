<?php 
class database{
    private $host=DB_host;
    private $dbname=DB_namet;
    private $user=DB_user;
    private $pass=DB_pass;
    private $dbh;
    private $stmt;
    private $error;
    public function __construct()
    {
     
        $dsn='mysql:host='.$this->host.';dbname='.$this->dbname;
        $option=array(
         PDO::ATTR_PERSISTENT=>true,
         PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        );
     try{
        $this->dbh=new PDO($dsn,$this->user,$this->pass,$option);
       } 
       catch(PDOException $e){
         $this->error=$e->getMessage();
       }
    }


public function query($q){
    $this->stmt=$this->dbh->prepare($q);
}
public function bind($param,$value,$type=null){
    if(is_null($type)){
        switch(true){
            case is_null($value) :
                $type=PDO::PARAM_NULL;
                break;
            case is_bool($value) :
                $type=PDO::PARAM_BOOL  ;
                break;
            case is_int($value) :
                $type=PDO::PARAM_INT;
                break;
            default :
            $type=PDO::PARAM_STR;          
        }
    }
 $this->stmt->bindValue($param,$value,$type);
}

public function execute(){
    return $this->stmt->execute();
}


public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
}

public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
}
 
public function rowCount(){
   return $this->stmt->rowCount();
}

}







?>