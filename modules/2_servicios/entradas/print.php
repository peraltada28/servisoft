<?php 

    require_once "../../assets/plugins/vendor/autoload.php";

    use Spipu\Html2Pdf\Html2Pdf;

    ob_start();
    require 'print_view.php';
    $namefile ="Vehiculos_en_espera.pdf";
    $html = ob_get_clean();

    $html2pdf = new Html2Pdf('P','A4','es');//habilitar utf8 con las caracteristicas de la hoja
    $html2pdf->writeHTML($html);
    $html2pdf->Output($namefile);

?>