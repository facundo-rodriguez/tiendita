
<?php

    require_once("../dompdf/autoload.inc.php");
        
    use Dompdf\Dompdf;

    include_once("descargar.php");
     
     $dompdf = new Dompdf();
     
     $dompdf->loadHtml($cuerpo);
     $dompdf->setPaper("A4", "landscape");
     
     $id = uniqid();
     $file = $id . ".pdf";
     $dompdf->render();
     
     $output=$dompdf->output();

     file_put_contents("tuCompra.pdf", $output);

     $dompdf->stream("tuCompra.pdf", array("Attachment" => true));


     unlink("tuCompra.pdf");

    //header("Content-Type: application/pdf; charset=iso-8859-1");
    //header("Content-Disposition: attachment; filename="."tuCompra.pdf");
  

     






?>





