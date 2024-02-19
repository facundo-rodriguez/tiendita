
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
    
   <!--0800 199 3106-->
    <header class="header">
        <nav>
            <h1>mi tienda</h1>

            <div>
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalNuevo"  >nuevo</button>
                

                <button onclick="listarCarrito()" class="btn btn-carrito" data-bs-toggle="modal" data-bs-target="#modalCarrito"> 
                    <img class="icono" src="iconos/carrito.png" alt="carrito">
                </button>
            </div>
        </nav>
       
    </header>

    <main >
        
        <?php
            include_once("conexion/config.php");
            include_once("conexion/conexion.php");
        ?>

        
        
        <form id="formBuscar">
            <label for="buscador">Buscar:</label>
            <input  class="form-control" type="text" id="buscador" name="buscador" >
         </form>
        

        <section id="section_gallery"> 

      
          

        </section>
        

        <?php 
          
            include_once("php/modalEditarZapatillas.php"); 

            include_once("php/modalIngresarNuevo.php"); 
            include_once("php/modalCarrito.php");
        ?>
        
    </main>

   
    <script src="script/jquery-3.7.0.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/editar.js"></script>
    <script src="js/eliminar.js"></script>
    <script src="js/ingresarNuevo.js"></script>
    
    
    <script>

        
        //$("#section_gallery").load("li.php  #ul, #botones_paginacion")

        lista(1,tamanioPagina());

       

        


 
        function editar(){
            //alert("editando");

            if(confirm("seguro?")){

                form=new FormData($("#formEditar")[0]);

                /*
                    id_zapatilla=$("#formEditar input[name='id_zapatilla_editar']").val();
                    modelo=$("#formEditar input[name='modelo_editar']").val();
                    precio=$("#formEditar input[name='precio_editar']").val();
                    imagen=$("#imagen_editar")[0].files[0];
                    descripcion=$("#formEditar textarea[name='descripcion_editar']").val();
                    marca=$("#formEditar select[name='marca_editar'] ").val();
                */

                //console.log({'id_zapatilla':id_zapatilla,'modelo':modelo, 'precio':precio })

                //console.log( $("#formEditar").serialize() )
                

                $.ajax({

                    url: "editarInfo.php",
                    type: "POST",
                    dataType: "json",
                    data:form,//{'id_zapatilla':id_zapatilla,'modelo':modelo, 'precio':precio, 'marca':marca, 'descripcion':descripcion, 'img':imagen },
                    contentType:false,
                    processData:false,
                    success: function(response){

                        //console.log( "la respuesta es "+ response );
                        
                        if(response==1){
                            lista($("#span_page").text())
                            alert("editado con exito");
                        }
                        else{
                            alert("no se actualizo :/");
                        }
                        


                    },
                    error: function (xhr, status, error) {
                        alert(error)
                    }

                })

            }
        }

        


        
        
       

            
        

    </script>

</body>
</html>