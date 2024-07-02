<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');// panggil autoload dompdf nya
use Dompdf\Dompdf;

class PDF {
    protected $ci; 

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    function generate($view, $data=array(), $filename='Laporan', $paper='F4', $orientation='landscape')
    {
       // $dompdf =new dompdf();
        $html   = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);
 	    $dompdf->setPaper($paper,  $orientation);  // (Optional) Setup the paper size and orientation
	    // Render the HTML as PDF
	    $dompdf->render();
        $dompdf->stream($filename.".pdf", array("Attachment" => FALSE));

    }
}















