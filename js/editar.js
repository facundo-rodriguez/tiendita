

function mostrarEditar(datos){

    id_zapatilla=$("#formEditar input[name='id_zapatilla_editar']").val(datos["id_zapatilla"]);
    modelo=$("#formEditar input[name='modelo_editar']").val(datos["modelo"]);
    precio=$("#formEditar input[name='precio_editar']").val(datos["precio"]);
    descripcion=$("#formEditar textarea[name='descripcion_editar']").text(datos["descripcion"]);
    marca=$("#formEditar select[name='marca_editar'] ").val(datos["id_marca"]);
    
    //imagen=$("#formEditar input[ name='imagen_editar']").val();
    //console.log("la imagen es: "+$("#formEditar input[ name='imagen']").val())
    //img= datos[3].split("/");
    nombre_imagen=$("#formEditar #nombre_imagen").text(datos["imagen"]);
    
}



$("#formEditar input[ name='imagen']").on("change",function(){

    
    $("#formEditar #nombre_imagen").text(this.value);

})



$("#formEditar").submit( (e)=>{

    e.preventDefault();

    form=new FormData();
    form.append("id_zapatilla_editar",$("#id_zapatilla_editar").val() );
    form.append("modelo_editar",$("#modelo_editar").val() );
    form.append("precio_editar",$("#precio_editar").val() );
    form.append("descripcion_editar",$("#descripcion_editar").val() );
    form.append("marca_editar",$("#marca_editar").val() );
    form.append("imagen",$("#imagen_editar")[0].files[0] );
    form.append("nombre_imagen_editar",$("#nombre_imagen").text())
                
    $.ajax({

        url: "php/editarInfo.php",
        type: "POST",
        dataType: "json",
        data:form,//{'id_zapatilla':id_zapatilla,'modelo':modelo, 'precio':precio, 'marca':marca, 'descripcion':descripcion, 'img':imagen },
        contentType:false,
        processData:false,
        success: function(response){

            //console.log( "la respuesta es "+ JSON.stringify( response) );
            
           if(response==1){
                lista($("#span_page").text())
                alert("editado con exito");
            }
            else{
                alert("no se actualizo :/" + ( (response!=0) ? response : "" ) );
            }
            


        },
        error: function (xhr, status, error) {
            console.log("ocurrio un error: "+ error + xhr.responseText)
        }

    })

})