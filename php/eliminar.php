

<?php

    $id_zapatilla= $_POST["id_zapatilla"];
    $img= explode( "/", $_POST["imagen"] );

    //if(is_file($img) ) 
     

    include_once("../conexion/config.php");
    include_once("../conexion/conexion.php");


    $sql="delete from zapatillas where id_zapatilla=?";
    $con=new db();

    $stmt=$con->prepare($sql);
    $stmt->bindParam(1,$id_zapatilla,PDO::PARAM_INT);

    if($stmt->execute()){
        unlink("../images/".$img[1]);
    }

    echo json_encode($stmt->rowCount());

    
    //echo json_encode( "images/".$img[1]   );
?>