<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Html2PdfException;

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/res/exemple06.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    try
    {
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple06.pdf');
    }
    catch(Html2PdfException $e) {
        echo $e;
        exit;
    }
