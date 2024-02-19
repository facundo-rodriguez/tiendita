
<?php

 include_once("conexion/config.php");
            include_once("conexion/conexion.php");
    

    /*
    include("config.php");
    include("conexion.php");

    $sql="select id_zapatilla, modelo, precio, imagen from zapatillas";

    $con= new db();



    $sql2="select count(*) as cantidad_total 
    from zapatillas z inner join marcas m on z.id_marca=m.id_marca  ";

    
    
    $result2=$con->query($sql2);
    $row2 = $result2->fetchAll(PDO::FETCH_ASSOC);

  

    $cantPage=(int)ceil($row2[0]["cantidad_total"]/3);

    echo $cantPage;

    */

    /*
        foreach($result as $r){
        print_r($r["id_zapatilla"] );
        }
    */

    
    /*
    foreach($row as $r){

        $d=json_decode("'".$r."'", true);
        
        echo json_encode($d);
    }*/

   #echo json_encode($row)

   //echo phpinfo();
  // $carrito = $_GET["carrito"];
  $buscador="a";
  $precio=0;
  $con= new db();
  $sql="select z.id_zapatilla as id_zapatilla, z.modelo as modelo, z.precio as precio, 
  z.imagen as imagen, z.descripcion as descripcion, m.id_marca as id_marca, 
  m.descripcion as descripcion_marca
  from zapatillas z inner join marcas m on z.id_marca=m.id_marca  ";
   
    $where="   where z.modelo LIKE ? OR m.descripcion LIKE ? OR precio LIKE ?";

    $sql.=$where;

              $stmt= $con->prepare($sql);
              $stmt->execute(["%$buscador%","%$buscador%","%$precio%"]);
              $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

              foreach($row as $r){
                echo json_encode($r["modelo"]);
              }




?>

