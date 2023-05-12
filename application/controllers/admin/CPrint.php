<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use Dompdf\Dompdf;
class CPrint extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("MMahasiswa");
    }
    public function index()
    {
       $data["mahasiswa"] = $this->MMahasiswa->getAll();
       $pdf = $this->load->view("admin/crudMahasiswa/print",$data,true);
      
       $dompdf = new Dompdf();
       $dompdf->set_option('isRemoteEnabled', TRUE);
       $dompdf->loadHtml($pdf);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('A4', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
       //$dompdf->stream();
       $dompdf->stream('my.pdf',array('Attachment'=>0));
    }
}