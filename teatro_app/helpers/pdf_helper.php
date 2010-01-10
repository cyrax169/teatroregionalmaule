<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

/*helper funcion ayuda a definir los margenes tipografía y creación del footer y números de pagína*/
function prep_pdf(){
    $CI =& get_instance();
    $CI->cezpdf->selectFont(APPPATH.'libraries/fonts/Courier.afm');

    $all = $CI->cezpdf->openObject();
    $CI->cezpdf->saveState();
    $CI->cezpdf->setStrokeColor(0,0,0,1);
    $CI->cezpdf->restoreState();
    $CI->cezpdf->closeObject();
    $CI->cezpdf->addObject($all,'all');
}
?>