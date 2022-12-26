<?php

    require_once '../../../assets/plugins/vendor/autoload.php';

    //alt 92 es \
    use Spipu\Html2Pdf\Html2Pdf;

    ob_start();
    include 'print_view.php';

    $content = ob_get_clean();
    $nombrefile ="reporte_funcionarios.pdf";

    $html2pdf = new Html2Pdf('P','A4','es');//tipo: papel, tamaño, idioma
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output($nombrefile);//nombre del archivo

?>