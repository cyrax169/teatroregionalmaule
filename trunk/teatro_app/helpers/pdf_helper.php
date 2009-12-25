<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

/*helper funcion ayuda a definir los margenes tipografía y creación del footer y números de pagína*/
function prep_pdf($orientation = 'portrait'){
    $CI =& get_instance();
    $CI->cezpdf->selectFont(APPPATH.'libraries/fonts/Courier.afm');

    $all = $CI->cezpdf->openObject();
    $CI->cezpdf->saveState();
    $CI->cezpdf->setStrokeColor(0,0,0,1);
    if($orientation == 'portrait') {
        $CI->cezpdf->ezSetMargins(20,70,20,20);
        $CI->cezpdf->ezStartPageNumbers(570,28,8,'','{PAGENUM}',1);
        $CI->cezpdf->line(20,40,578,40);
        $CI->cezpdf->addText(25,32,8,'Impreso ' . date('d/m/Y'));
    }
    else {
        $CI->cezpdf->ezStartPageNumbers(570,28,8,'','{PAGENUM}',1);
        $CI->cezpdf->line(20,40,578,40);
        $CI->cezpdf->addText(25,32,8,'Impreso '.date('d/m/Y'));
    }
    $CI->cezpdf->restoreState();
    $CI->cezpdf->closeObject();
    $CI->cezpdf->addObject($all,'all');
}
?>