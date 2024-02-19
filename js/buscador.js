
function tamanioPagina(){

    return (window.innerWidth<=768) ? 2 : 3;
}


function cargarGaleria(){

    $("#section_gallery").load("./php/li.php #ul, #botones_paginacion");
}



function cantidad_paginas(){

    return parseInt($("#span_cantPage").text().split("/")[1], 10 );
}
    


var numPage=parseInt($("#span_page").text(),10 );


function sumPage(n){

    
    if( n < cantidad_paginas() ){ 
          
            console.log("suma despues del if " + n);
          
            
            lista( n+1, tamanioPagina() )
    
           
    } 
}


function resPage(n){
        
    if(n-1>0){
        
        
        console.log("res" + n);
        

        lista(n-1, tamanioPagina())
    }
    
    
}


$(window).on("resize",function(){

    
    // let anchoViewport = window.innerWidth;
    // let itemsPage= (anchoViewport<=768) ? 2 : 3;
    
    //console.log("ancho viewport: " + anchoViewport + " items: "+ itemsPage);
    lista($("#span_page").text(), tamanioPagina())
})


$("#buscador").keyup((e)=>{
    
    e.preventDefault();  
    
    
        
    lista($("#span_page").text() , tamanioPagina())
    
})

$("#formBuscar").keydown((e)=>{
  
    if(e.keyCode==13) e.preventDefault();
        
    //lista($("#span_page").text())
    
})


 
function lista(num , itemsPage){

  
    $.ajax({
    
        url: "php/li.php ",
        type: "POST",
        dataType: "html",
        data: {
                'buscador': $("#buscador").val() , 
                'pagActual':  num,
                'itemsPage':  itemsPage
            },
        
            success: function(response){
    
            $("#section_gallery ").html(response)
            
            $("#span_cantPage").text( "/"+cantidad_paginas())

            
    
        },
        error: function (xhr, status, error) {
                
            console.log(("ocurrio un error: "+ error + xhr.responseText));
            alert("ocurrio un error: "+ error + xhr.responseText)
    
        }
    
    })
    
}


