
<?php 

    include_once("../conexion/config.php");
    include_once("../conexion/conexion.php");

    $id_zapatilla=$_POST["id_zapatilla_editar"];
    $modelo=$_POST["modelo_editar"];
    $precio=$_POST["precio_editar"];
    $id_marca=$_POST["marca_editar"];
    $descripcion=$_POST["descripcion_editar"];
    

    if( !isset($_FILES['imagen']) ){
        
        $nombre_img=$_POST["nombre_imagen_editar"]; //si no existe deberia tirar una excepcion y cortar el programa, lo deberia hacer con todas las variables 
        
    }
    else{
        
        if($_FILES['imagen']['name']!=NULL || $_FILES['imagen']['name']!=""){
            
            include_once("upload_image.php");
            //$nombre_img=$_FILES['imagen_editar']['name'];
            
        }
    }


    $path_img=$nombre_img; //"images/".$nombre_img;

    $sql= "update zapatillas set modelo=?, precio=?, imagen=?, id_marca=?, descripcion=? 
            where id_zapatilla=?";

    $con=new db();

    $stmt= $con->prepare($sql);

    $stmt->bindParam(1, $modelo, PDO::PARAM_STR);
    $stmt->bindParam(2, $precio);
    $stmt->bindParam(3, $path_img, PDO::PARAM_STR);
    $stmt->bindParam(4, $id_marca, PDO::PARAM_INT);
    $stmt->bindParam(5, $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(6, $id_zapatilla, PDO::PARAM_INT);

    //$stmt->execute(array($modelo,$precio,$id_zapatilla))
    if($stmt->execute()){
        echo json_encode($stmt->rowCount());

    }
    else{
        echo json_encode($stmt->errorInfo());
    } 

    

    /*
    echo json_encode(array(
        "id_zapatilla" => $id_zapatilla,
        "modelo" => $modelo,
        "precio" => $precio,
        "id_marca" => $id_marca,
        "descripcion" => $descripcion,
        "nombre_img" => $nombre_img,
    ));
    */


?>