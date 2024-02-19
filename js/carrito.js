

 if(!localStorage.getItem("carrito")){
    
    localStorage.setItem("carrito", JSON.stringify([]) ) ;
 }


// listarCarrito()

function listarCarrito(){

    carrito= JSON.parse( localStorage.getItem("carrito")  )

    let filas;
    
    //console.log(Array.isArray(carrito))
   //JSON.stringify(carrito)

   //for(let i of Array.prototype.keys.call(carrito))

    if(carrito.length!=0){
        
        total=0
        for( let i=0; i < carrito.length; i++ ){
        
        
            //d= 'id_zapatilla='+carrito[i].id_zapatilla + '&cantidad='+ carrito[i].cantidad
            total+=carrito[i].cantidad * carrito[i].precio
            filas+=  `   
                            <tr>
                                <td> ${ carrito[i]['modelo'] }  <br> precio: ${carrito[i].precio}</td>
                                <td> ${carrito[i].cantidad}</td>
                                <td> ${carrito[i].cantidad * carrito[i].precio}</td>
                                <td><button onclick='quitarCarrito( ${JSON.stringify(carrito) }, ${i} )' > quitar</button></td>
                                
                            </tr>
                            
                        `;
                }

            monto=
                    `<tr>
                        <td> <b> total </b> </td>
                        <td colspan=3 >${total} </td>
                    </tr>`;
            
            filas+=monto;
    
    }
    else{
        
        filas+=`<tr><td colspan=4>  vacio  </td></tr>`
        
    }
   
    $(".modal-body").css("text-align","center")
    $("#listaCarrito").html(filas);
    
    
}




function agregarCarrito(datos){
 

    carrito= JSON.parse( localStorage.getItem("carrito")  )
    
    indice= carrito.findIndex( (e) => e.id_zapatilla == datos.id_zapatilla );

    if(indice!=-1){
    
        carrito[indice]["cantidad"]+=1;
    }
    else{
        
        datos["cantidad"]=1;

        carrito.push(datos);
    }
    
    localStorage.setItem("carrito", JSON.stringify(carrito) )
    


}


function quitarCarrito(carrito,indice){ 

    
    bandera=false;

    //event.preventDefault();
   
    if(carrito[indice].cantidad>1){

        carrito[indice]["cantidad"]-=1;
        bandera=true;
    }
    else{
        carrito.splice(indice,1)
        bandera=true;
        console.log(carrito)
    }

    

    if(bandera){
        localStorage.setItem("carrito", JSON.stringify(carrito) )
       listarCarrito()
    }

   
}



//envio los datos para que se cree el pdf
$("#btnComprar").click(function(){

    carrito=  localStorage.getItem("carrito") 
    window.location.href= "./php/comprar.php?carrito="+encodeURIComponent(carrito) ;

    localStorage.setItem("carrito", JSON.stringify([]) ) ;
})



/*
<table>
       <thead>
            <th>codigo</th>
            <th>producto</th>
            <th>cantidad</th>
            <th>precio</th>
            <th>monto</th>
        </thead>
        <tbody>
            
        <?php 


            $total = 0;
            foreach ($carrito as $i){
                $total += $i["cantidad"] * $i["precio"];
        ?>
                <tr>
                    <td><?php echo $i["id_zapatilla"] ?></td>
                    <td><?php echo $i["modelo"] ?></td>
                    <td><?php echo $i["cantidad"] ?></td>
                    <td><?php echo $i["precio"] ?></td>
                    <td><?php echo $i["cantidad"] * $i["precio"] ?></td>
        
        <?php
            }    
        ?> 
            <tr>
                <td colspan=3>total</td>
                <td><?php echo $total ?></td>
            </tr>   
        </tbody>
</table>

*/