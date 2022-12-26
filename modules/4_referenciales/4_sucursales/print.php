<?php 

require_once '../../assets/plugins/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();

include 'print_view.php';

$content = ob_get_clean();
$nombrefile = "report_sucursales.pdf";

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
$html2pdf->output($nombrefile);//nombre del archivo

?>