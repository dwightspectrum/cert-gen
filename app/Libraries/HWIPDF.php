<?php

namespace App\Libraries;

// require_once dirname(FCPATH) . '/vendor/autoload.php';
use \Mpdf\Mpdf;

class HWIPDF
{

    public static function init($html) {

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        return $mpdf;
    }


}