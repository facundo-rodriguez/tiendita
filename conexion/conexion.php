
<?php

    class db{


        protected $conexion;

        function __construct(){
            
            try{
                
                //'mysql:dbname=tienda; host=localhost; port=3306', 'root',''
                $this->conexion= new PDO(dsn, username, password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8mb4'));

               // $this->conexion->set_charset("utf8mb4");
            }
            catch(PDOException $e){

                echo $e->getMessage();
            }
           
        
        }

        
        function query($sql){

            return $this->conexion->query($sql);
        }

        function prepare($sql){

            return $this->conexion->prepare($sql);
        }

        
        function close(){
            
            
            $this->conexion=null;

        }



    
    }



?>