
<?php

    $cuerpo= '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <style>

                table{
                    margin: auto;
                    border: 1px solid black;
                }
                table tr{
                    border: 1px solid black;
                }


            </style>
            
        </head>
        <body>
    ';


    $carrito = json_decode($_GET["carrito"]);

    $tabla=' 
            <table>
                    <thead>
                        <tr>
                            <th>codigo</th>
                            <th>producto</th>
                            <th>cantidad</th>
                            <th>precio</th>
                            <th>monto</th>
                        </tr>
                    </thead>
                <tbody>
        ';

    $total = 0;

    foreach ($carrito as $i){
        
        $total += $i->cantidad * $i->precio;     
        
        $tabla.='     
                <tr>
                    <td>'. $i->id_zapatilla .'</td>
                    <td>'. $i->modelo .'</td>
                    <td>'.  $i->cantidad .'</td>
                    <td>'.  $i->precio .'</td>
                    <td>'.  $i->cantidad * $i->precio .'</td>
                </tr>';
    }

    $tabla.='   
                <tr>
                    <td colspan="3">total</td>
                    <td>'.  $total .'</td>
                </tr>
            </tbody>
        </table> ';

   
        
    $cuerpo.=$tabla;

    $cuerpo.=
            '
                    </body>
                </html>
            ';



?>