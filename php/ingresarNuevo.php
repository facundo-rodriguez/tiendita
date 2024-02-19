

<?php

    include_once("../conexion/config.php");
    include_once("../conexion/conexion.php");

    try{
        
        $modelo=$_POST['modelo'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        //$genero=$_POST['genero'];
        //$disciplina=$_POST['disciplina'];
        $marca=$_POST['marca'];

        include_once("upload_image.php");

        $path_img="images/".$nombre_img;
        
       $sql="insert into zapatillas (modelo,precio,descripcion,id_marca,imagen) 
            values (?,?,?,?,?)";

        $con=new db();
        $stmt=$con->prepare($sql);
        $stmt->bindParam(1,$modelo,PDO::PARAM_STR);
        $stmt->bindParam(2,$precio,PDO::PARAM_STR);
        $stmt->bindParam(3,$descripcion,PDO::PARAM_STR);
        $stmt->bindParam(4,$marca,PDO::PARAM_INT);
        $stmt->bindParam(5,$path_img,PDO::PARAM_STR);
        
        if($stmt->execute()){

            echo json_encode($stmt->rowCount());
        }
        else{
            echo json_encode( $stmt->errorInfo() );
        }

        
               
    }
    catch(PDOException $e){

        echo json_encode($e->getMessage());
    }
    

?>