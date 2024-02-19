

function eliminar(datos){

    if(confirm("seguro?")){

        $.ajax({

            url: "php/eliminar.php",
            type: "POST",
            dataType: "json",
            data:{'id_zapatilla': datos['id_zapatilla'], 'imagen':datos['imagen']},
            success: function(response){

                console.log( "la respuesta es "+ response );

                if(response==1){

                    lista(1);
                    alert("se elimino el producto");
                }
                else{

                    alert("no se elimino :/");
                }
                
                

            },
            error: function (xhr, status, error) {
                alert("error: " +error );
                console.log(error +" "+ xhr )
            }

        })

    }

}