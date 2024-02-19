

 $("#formIngresar").submit( (e)=> ingresarNuevo(e) );

 function ingresarNuevo(e){

     e.preventDefault();

     form=new FormData();
     form.append("modelo",$("#modelo_ingresar").val() );
     form.append("precio",$("#precio_ingresar").val() );
     form.append("marca",$("#marca_ingresar").val() );
     form.append("imagen",$("#imagen_ingresar")[0].files[0]);
     form.append("descripcion",$("#descripcion_ingresar").val() );


     if(confirm("seguro?")){

         $.ajax({

             url: "php/ingresarNuevo.php",
             type: "POST",
             //dataType: "json",
             contentType:false,
             processData:false,
             data:form,
             success: function(response){

                 console.log( "la respuesta es "+ response );
                 

                 
                 if(response==1){

                     lista($("#span_page").text())
                     alert("se ingreso el producto");
                 }
                 else{

                     alert("no se ingreso :/" + ( (response!=0) ? response : "" ) );
                 }
                 
                 
                 

             },
             error: function (xhr, status, error) {
                 alert(error)
             }

         })

     }            

}