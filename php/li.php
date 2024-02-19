
    <?php
            include_once("../conexion/config.php");
            include_once("../conexion/conexion.php");
    
            
            
            $sql="select z.id_zapatilla as id_zapatilla, z.modelo as modelo, z.precio as precio, 
            z.imagen as imagen, z.descripcion as descripcion, m.id_marca as id_marca, 
            m.descripcion as descripcion_marca
            from zapatillas z inner join marcas m on z.id_marca=m.id_marca  ";


            $sql2="select count(*) as cantidad_total 
                   from zapatillas z inner join marcas m on z.id_marca=m.id_marca  ";

                   
            
            $itemsPage = (int)$_POST["itemsPage"] ;

            if(isset($_POST["pagActual"])){

                if( (int)$_POST["pagActual"] ==0 ){
                    (int)$_POST["pagActual"]=1;
                }

                $pagActual= ( (int)$_POST["pagActual"] == 1 ) ? 0 : ( (int)$_POST["pagActual"] -1 ) * $itemsPage; //( (int)($_POST["pagActual"]) )* $itemsPage;

            }

            $limit=" limit ". $itemsPage  ." offset ". $pagActual;

    ?>

            <script>
                console.log('el post pagActual es:  <?php echo (int)$_POST["pagActual"] .", la variable pagActual es ". $pagActual ?> ' )
                console.log("el buscador es: " + "<?php echo $_POST["buscador"]  ?> " )
            </script>
    <?php
            
            
            
            $params=[];
            $precio=NULL;

            if( !empty($_POST["buscador"]) ){

                
                $buscador=$_POST["buscador"];
                //$precio=(is_numeric($_POST["buscador"])) ? $_POST["buscador"]: NULL;
                //$precio = (!empty($_POST["buscador"])) ? $_POST["buscador"] : NULL;
                $precio =  $_POST["buscador"] ;
                //$where=" where z.modelo like '%".$buscador."%' or m.descripcion like '%". $buscador."%' or precio like '% ". $precio . " %' or m.descripcion like '%".$buscador."%' "; 
                $where="  where z.modelo LIKE ? or m.descripcion LIKE ? or z.precio LIKE '%".$precio."%'" ;
                
                $params=["%$buscador%","%$buscador%"];
       
                $sql.= $where;          

                $sql2.= $where;
            }
  
            $sql.= $limit;

            $con= new db();
            //$con2= new db();

            $stmt= $con->prepare($sql);

            $stmt->execute($params);
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
           
        
            $stmt2= $con->prepare($sql2);
            
            $stmt2->execute($params);
            $row2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
       
            $cantPage=(int)ceil($row2[0]["cantidad_total"]/$itemsPage);
            $con->close();
            /*
            
            if( ( (int)$_POST["pagActual"]+1) ==$cantPage ){
                $_POST["pagActual"]=(int)$_POST["pagActual"]+1;
            }*/

            if( empty($row) ){
    ?>        
                <h2>no se encuentra</h2>
    <?php
            }
            else{
    ?>
                <ul id="ul">
    
    <?php
    
                foreach($row as $r){    

    ?>

                    <li class="lista-productos">
                        <figure>
                            <img src="<?php echo $r['imagen']?>" alt="">
                            
                        </figure>
                        <figcaption>
                                <p> modelo: <br>
                                    <?php echo $r['modelo'] ?>
                                <br> 
                                precio: <?php echo $r['precio'] ?> 
                                </p>
                                
                                <div>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar" onclick='mostrarEditar( <?php echo json_encode($r,JSON_HEX_QUOT)  ?> )'><img class="icono" src="iconos/editar.png" alt="editar"/></button>
                                    <button class="btn btn-danger" onclick='eliminar(<?php echo json_encode($r,JSON_HEX_QUOT)  ?> )'><img  class="icono" src="iconos/delete.png" alt="eliminar"/></button>
                                    <button class="btn btn-warning" id="agregarCarrito" onclick='agregarCarrito(<?php echo json_encode($r,JSON_HEX_QUOT)  ?> )'>+</button>
                                </div>
                        </figcaption>
                    </li>
            

    <?php
                } 
    ?>        
            </ul>
            
            <div id="botones_paginacion">
                
                <button id="btnRes" class="btn" onclick="resPage(<?php echo (int)$_POST['pagActual'] ?>)"> << </button>
                
                <span   id="span_page"> <?php echo ( (int)$_POST["pagActual"] == 1 ) ? 1 :(int)$_POST["pagActual"]  ?> </span><span id="span_cantPage">/<?php echo $cantPage ?></span>
                
                <button id="btnSum" class="btn" onclick="sumPage(<?php echo (int)$_POST['pagActual'] ?>)"> >> </button>  
                
            </div>

    <?php
    
        }
    ?>



